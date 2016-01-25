<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use App\tbl_recipe_categories;
use App\tbl_cuisines;
use App\tbl_recipe_cooking_methods;
use App\tbl_prepare_time;
use App\tbl_recipes;
use App\tbl_recipe_ingredients;
use App\tbl_recipe_instructions;
use App\tbl_measure_units;
use App\tbl_tags;
use App\tags;
use App\tbl_recipe_likes;
use App\tbl_recipe_comments;
use App\User;
use DB;
use Input;
use Auth;
use Psy\Util\Json;
use Illuminate\Support\Facades\View;
use App\tbl_activities;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class Recipe extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for adding a new recipe.
     *
     * @return Response
     */
    public function addRecipe() {
        $data = array(
            'categories' => tbl_recipe_categories::all(),
            'cuisines' => tbl_cuisines::all(),
            'methods' => tbl_recipe_cooking_methods::all(),
            'prepare_time' => tbl_prepare_time::all(),
            'units' => tbl_measure_units::all()
        );
        return view('pages/addRecipe', $data);
    }

    public function saveRecipe(Request $request) {

        $image = Input::file('recipe_image');
        if (!empty($image)) {

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/' . $filename);

            $image_x = $request->x;
            $image_y = $request->y;
            $image_width = $request->w;
            $image_height = $request->h;

            Image::make($image->getRealPath())->crop($image_width, $image_height, $image_x, $image_y)->resize(350, 200)->save($path);
        }

        $recipe = new tbl_recipes;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->note = $request->note;
        $recipe->category_id = $request->category;
        $recipe->cooking_method_id = $request->cooking_method;
        $recipe->cuisine_id = $request->cuisine;
        $recipe->servings = $request->servings;
        $recipe->preparation_time = $request->prepare_time;
        $recipe->youtube_url = $request->youtube_link;
        $recipe->is_vegetarian = $request->is_vegetarian;
        $recipe->links = $request->other_link;
        if (!empty($filename)) {
            $recipe->image = $filename;
        }
        $recipe->added_by = Auth::user()->id;


        $arrIngredients = array();
        $ingredient_count = $request->ingredient_count;

        if ($ingredient_count == 0) {
            $arrIngredients[] = array(
                "name" => $request->ingredient_name,
                "unit_id" => $request->unit,
                "quantity" => $request->quantity
            );
        } else {
            for ($i = 0; $i < $ingredient_count; $i++) {
                if ($i == 0) {
                    $arrIngredients[] = array(
                        "name" => $request->ingredient_name,
                        "unit_id" => $request->unit,
                        "quantity" => $request->quantity
                    );
                } else {
                    if (!empty($_POST["ingredient_name_" . $i])) {
                        $arrIngredients[] = array(
                            "name" => $_POST["ingredient_name_" . $i],
                            "unit_id" => $_POST["unit_" . $i],
                            "quantity" => $_POST["quantity_" . $i]
                        );
                    }
                }
            }
        }

        $recipe->save();

        $data_log = array(
            'action_by' => Auth::user()->id,
            'action_type' => "R",
            'recipe_id' => $recipe->id,
        );
        tbl_activities::create($data_log);


        $arrIngredientList = array();
        $r = 0;
        foreach ($arrIngredients as $info) {
            $arrIngredientList[$r] = new tbl_recipe_ingredients;
            $arrIngredientList[$r]->name = $info['name'];
            $arrIngredientList[$r]->unit_id = $info['unit_id'];
            $arrIngredientList[$r]->quantity = $info['quantity'];
            $r++;
        }
        $recipe->ingredients()->saveMany($arrIngredientList);


        $arrInstructions = array();
        $instruction_count = $request->instruction_count;
        if ($instruction_count == 0) {
            $arrInstructions[] = $request->instruction;
        } else {
            for ($i = 0; $i < $instruction_count; $i++) {
                if ($i == 0) {
                    $arrInstructions[] = $request->instruction;
                } else {
                    if (!empty($_POST["instruction_" . $i])) {
                        $arrInstructions[] = $_POST["instruction_" . $i];
                    }
                }
            }
        }



        $arrInstructionList = array();
        $r = 0;
        foreach ($arrInstructions as $inst) {
            $arrInstructionList[$r] = new tbl_recipe_instructions;
            $arrInstructionList[$r]->instruction = $inst;
            $r++;
        }
        $recipe->instructions()->saveMany($arrInstructionList);



        $arrTags = explode(',', $request->tags);
        $arrKeywords = explode(' ', $request->name);

        $arrTags = array_merge($arrTags, $arrKeywords);

        $arrTags = array_unique($arrTags);

        $arrTagsList = array();
        $arrTagIds = array();
        $t = 0;
        foreach ($arrTags as $tag) {
            $arrTagsList[$t] = new tbl_tags;
            $arrTagsList[$t]->name = trim($tag);
            $t++;

            $tag_info = array(
                'name' => $tag
            );
            $tagId = tags::firstOrCreate($tag_info);
            $arrTagIds[] = $tagId->id;
        }


        $recipe->tags()->saveMany($arrTagsList);

        $recipe->tag()->attach($arrTagIds);

        return redirect('manage_recipe');
    }

    public function manageRecipe(Request $request) {
        $searchFor = (!empty($_GET['keyword'])) ? $_GET['keyword'] : $request->searchFor;

        if (!empty($searchFor)) {
            $count = tbl_recipes::where('name', 'LIKE', '%' . $searchFor . '%')->where('deleted', '=', '0')->count();
            $recipes = tbl_recipes::where('name', 'LIKE', '%' . $searchFor . '%')->where('deleted', '=', '0')->paginate(9);
            $recipes->setPath('manage_recipe');
        } else {
            $recipes = array();
            $count = '';
        }

        $data = array(
            'count' => $count,
            'recipes' => $recipes,
            'searchFor' => $searchFor
        );

        return view('pages/manageRecipe', $data);
    }

    public function myRecipe(Request $request) {
        $userId = $request->userId;
        if (!empty($userId)) {

            $count = tbl_recipes::where('added_by', '=', $userId)->where('deleted', '=', '0')->orderBy('name', 'asc')->count();
            $recipes = tbl_recipes::where('added_by', '=', $userId)->where('deleted', '=', '0')->orderBy('name', 'asc')->paginate(9);
            $recipes->setPath('my_recipe');

            $data = array(
                'count' => $count,
                'recipes' => $recipes,
                'userId' => $userId,
                'userName' => User::find($userId)->userName()
            );

            return view('pages/myRecipe', $data);
        }
    }

    public function viewRecipe($recipe_id) {
        $data = array(
            'recipe' => tbl_recipes::find($recipe_id)
        );
        return view('pages/viewRecipe', $data);
    }

    public function editRecipe($recipe_id) {
        $data = array(
            'recipe' => tbl_recipes::find($recipe_id),
            'categories' => tbl_recipe_categories::all(),
            'cuisines' => tbl_cuisines::all(),
            'methods' => tbl_recipe_cooking_methods::all(),
            'prepare_time' => tbl_prepare_time::all(),
            'units' => tbl_measure_units::all()
        );
        return view('pages/editRecipe', $data);
    }

    public function processEditRecipe(Request $request) {

        $image = Input::file('recipe_image');
        if (!empty($image)) {

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/' . $filename);

            $image_x = $request->x;
            $image_y = $request->y;
            $image_width = $request->w;
            $image_height = $request->h;
            $old_image = $request->old_image;

            Image::make($image->getRealPath())->crop($image_width, $image_height, $image_x, $image_y)->resize(350, 200)->save($path);

            File::delete($old_image);
        }
        $recipe_id = $request->recipe_id;
        if (!empty($recipe_id)) {
            $recipe = tbl_recipes::find($recipe_id);
            $recipe->name = $request->name;
            $recipe->description = $request->description;
            $recipe->note = $request->note;
            $recipe->category_id = $request->category;
            $recipe->cooking_method_id = $request->cooking_method;
            $recipe->cuisine_id = $request->cuisine;
            $recipe->servings = $request->servings;
            $recipe->preparation_time = $request->prepare_time;
            $recipe->youtube_url = $request->youtube_link;
            $recipe->is_vegetarian = $request->is_vegetarian;
            $recipe->links = $request->other_link;

            if (!empty($filename)) {
                $recipe->image = $filename;
            }
            $recipe->save();


            $arrTags = explode(',', $request->tags);
            $arrTagsList = array();
            $arrTagIds = array();
            $t = 0;
            foreach ($arrTags as $tag) {
                $arrTagsList[$t] = new tbl_tags;
                $arrTagsList[$t]->name = trim($tag);
                $t++;

                $tag_info = array(
                    'name' => $tag
                );
                $tagId = tags::firstOrCreate($tag_info);
                if (!empty($tagId)) {
                    $arrTagIds[] = $tagId->id;
                }
            }

            $recipe->tag()->sync($arrTagIds);

            return redirect()->back()->with('show_success', 'Recipe updated successfully');
        }
    }

    public function addIngredient(Request $request) {
        $intRecipeId = $request->intRecipeId;
        $intIngredientId = $request->intIngredientId;
        if (!empty($intRecipeId)) {

            if (!empty($intIngredientId)) {
                $arrIng = tbl_recipe_ingredients::find($intIngredientId);
                $ingredent = array(
                    'name' => $arrIng->name,
                    'quantity' => $arrIng->quantity,
                    'unit_id' => $arrIng->unit_id
                );
            } else {
                $ingredent = array(
                    'name' => '',
                    'quantity' => '',
                    'unit_id' => ''
                );
            }

            $model_title = (!empty($intIngredientId)) ? 'Edit' : 'Add';
            $model_title.= ' Ingredient';
            $model_body = View::make('pages/addIngredient', ['ingredent' => $ingredent, 'units' => tbl_measure_units::all(), 'intRecipeId' => $intRecipeId, 'intIngredientId' => $intIngredientId])->render();
            return response()->json([
                        'modal_title' => $model_title, 'modal_body' => $model_body
            ]);
        }
    }

    public function processAddIngredient(Request $request) {
        $id = $request->intIngredientId;
        $recipe_id = $request->intRecipeId;
        $name = $request->ingredient_name;
        $quantity = $request->quantity;
        $unit_id = $request->unit;

        $ingredient = tbl_recipe_ingredients::findOrNew($id);
        $ingredient->recipe_id = $recipe_id;
        $ingredient->name = $name;
        $ingredient->quantity = $quantity;
        $ingredient->unit_id = $unit_id;
        $ingredient->save();

        $recipe = tbl_recipes::find($recipe_id);
        echo View::make('pages/subviewIngredient', ['recipe' => $recipe])->render();
    }

    public function deleteIngredient(Request $request) {
        $ingredient_id = $request->intIngredientId;
        $recipe_id = $request->intRecipeId;

        $ingredient = tbl_recipe_ingredients::find($ingredient_id);
        $ingredient->delete();

        $recipe = tbl_recipes::find($recipe_id);
        echo View::make('pages/subviewIngredient', ['recipe' => $recipe])->render();
    }

    public function addInstruction(Request $request) {
        $intRecipeId = $request->intRecipeId;
        $intInstructionId = $request->intInstructionId;
        if (!empty($intRecipeId)) {

            if (!empty($intInstructionId)) {
                $arrIng = tbl_recipe_instructions::find($intInstructionId);
                $instruction = array(
                    'instruction' => $arrIng->instruction
                );
            } else {
                $instruction = array(
                    'instruction' => ''
                );
            }

            $model_title = (!empty($intInstructionId)) ? 'Edit' : 'Add';
            $model_title.= ' Instruction';
            $model_body = View::make('pages/addInstruction', ['instruction' => $instruction, 'intRecipeId' => $intRecipeId, 'intInstructionId' => $intInstructionId])->render();
            return response()->json([
                        'modal_title' => $model_title, 'modal_body' => $model_body
            ]);
        }
    }

    public function processAddInstruction(Request $request) {
        $id = $request->intInstructionId;
        $recipe_id = $request->intRecipeId;
        $strInstruction = $request->instruction;

        $instruction = tbl_recipe_instructions::findOrNew($id);
        $instruction->recipe_id = $recipe_id;
        $instruction->instruction = $strInstruction;
        $instruction->save();

        $recipe = tbl_recipes::find($recipe_id);
        echo View::make('pages/subviewInstruction', ['recipe' => $recipe])->render();
    }

    public function deleteInstruction(Request $request) {
        $instruction_id = $request->intInstructionId;
        $recipe_id = $request->intRecipeId;

        $instruction = tbl_recipe_instructions::find($instruction_id);
        $instruction->delete();

        $recipe = tbl_recipes::find($recipe_id);
        echo View::make('pages/subviewInstruction', ['recipe' => $recipe])->render();
    }

    public function likeRecipe(Request $request) {
        if (!empty($request)) {
            $recipe_id = $request->recipe_id;
            $recipe = tbl_recipes::find($recipe_id);

            if (count($recipe->like) > 0) {
                if ($recipe->like->like == 1) {
                    $flag = 0;
                } else {
                    $flag = 1;
                }
                $userLike = $recipe->like;
                $userLike->like = $flag;
                $userLike->save();
            } else {
                $like = new tbl_recipe_likes(['user_id' => Auth::user()->id, 'like' => '1']);
                $recipe->likes()->save($like);
                $flag = 1;
            }

            $data_log = array(
                'action_by' => Auth::user()->id,
                'action_type' => "L",
                'recipe_id' => $recipe->id,
            );
            tbl_activities::firstOrCreate($data_log);

            $likes_count = count($recipe->like_count);

            return response()->json([
                        'liked' => $flag, 'likes_count' => $likes_count
            ]);
        }
    }

    function comments(Request $request) {
        $recipe = tbl_recipes::find($request->recipe_id);

        $likeNames = array();
        foreach ($recipe->like_count as $like) {
            $likeNames[] = $like->user->name;
        }

        $subTitle = array(
            $recipe->category->name, $recipe->cuisine->name, $recipe->cooking_method->name
        );
        $model_title = "<b>" . $recipe->name . '</b>, <span class="text-muted">' . implode($subTitle, ',') . '</span><br><small><a href="#" data-toggle="tooltip" title="' . implode($likeNames, ',') . '">' . count($recipe->like_count) . ' People likes this</a></small>';

        $model_body = View::make('pages/commentBox', ['recipe' => $recipe])->render();

        return response()->json([
                    'modal_title' => $model_title, 'modal_body' => $model_body, 'comment_count' => count($recipe->comments)
        ]);
    }

    function comments_inline(Request $request) {
        $recipe = tbl_recipes::find($request->recipe_id);

        $likeNames = array();
        foreach ($recipe->like_count as $like) {
            $likeNames[] = $like->user->name;
        }

        $model_title = '<span><a href="#" data-toggle="tooltip" title="' . implode($likeNames, ',') . '">' . count($recipe->like_count) . ' People likes this</a></span>';

        $model_body = View::make('pages/commentBox', ['recipe' => $recipe])->render();

        return response()->json([
                    'modal_title' => $model_title, 'modal_body' => $model_body, 'comment_count' => count($recipe->comments)
        ]);
    }

    function saveComment(Request $request) {

        $comment = new tbl_recipe_comments;

        $comment->recipe_id = $request->recipe_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();


        $data_log = array(
            'action_by' => Auth::user()->id,
            'action_type' => "C",
            'comment' => $request->comment,
            'recipe_id' => $request->recipe_id
        );
        tbl_activities::firstOrCreate($data_log);
    }

    public function deleteComment(Request $request) {
        $intCommentId = $request->intCommentId;
        if (!empty($intCommentId)) {
            $comment = tbl_recipe_comments::find($intCommentId);
            $comment->delete();
        }
    }

    public function fetchRecipes() {
        $data = tbl_recipes::where('active','=', 1)->orderBy('name')->get();
        $typo = array();
        foreach ($data as $d) {
            $typo[] = array(
                'value' => $d['id'],
                'label' => $d['name']
            );
        }
        echo json_encode($typo);
    }

    public function viewImageCrop(Request $request) {
        $image = $request->strImage;
        $strSquare = $request->strSquare;
        if (empty($strSquare)) {
            $strSquare = '';
        }
        echo View::make('pages/viewImageCrop', ['image' => $image, 'strSquare' => $strSquare])->render();
    }

    public function deleteRecipe(Request $request) {
        $intRecipeId = $request->intRecipeId;

        if (!empty($intRecipeId)) {
            $recipe = tbl_recipes::find($intRecipeId);
            $recipe->deleted = 1;
            $recipe->deleted_at = date('Y-m-d h:m:s');
            $recipe->save();

            $arrLog = tbl_activities::where('recipe_id', '=', $intRecipeId)->get();
            foreach ($arrLog as $log) {
                $timeline = tbl_activities::find($log['id']);
                $timeline->active = 0;
                $timeline->save();
            }
        }
    }

}
