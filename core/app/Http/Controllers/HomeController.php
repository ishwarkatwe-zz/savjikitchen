<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\tbl_recipe_categories;
use App\tbl_recipes;
use App\Providers\RecipeService as sRecipe;
use DB;
use App\View;
use App\Newletter;

class HomeController extends Controller {

    public function home() {
        $data = array(
            'categories' => tbl_recipe_categories::all(),
            'recipes' => tbl_recipes::active()->orderBy('created_at', 'desc')->limit(6)->get()
        );
        return view('home', $data);
    }

    public function viewDetail(Request $request) {
        $intRecipeId = $request->id;
        if (!empty($intRecipeId)) {

            $cip = $request->ip();
            $viewCount = array(
                'ip' => $cip,
                'recipe_id' => $intRecipeId
            );

            $chk = View::where('ip', 'LIKE', '"%' . $cip . '%"')->where('recipe_id', '=', $intRecipeId)->get();
            $chks = $chk->toArray();
            if (count($chks) == 0) {
                $view = View::firstOrNew($viewCount);
                $view->save();
            }


            $data = array(
                'recipe' => tbl_recipes::find($intRecipeId),
                'recent' => sRecipe::recent(),
                'categories' => sRecipe::getCategories(),
                'keyword' => '',
                'tags' => sRecipe::getTags($intRecipeId)
            );
            return view('viewDetail', $data);
        }
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $field_id = $request->field_id;
        $field_type = $request->field_type;

        if (!empty($field_id) && !empty($field_type)) {
            if ($field_type == 'C') {
                $result = tbl_recipes::where('category_id', '=', $field_id)->paginate(15);
            } else {
                $result = tbl_recipes::join('tbl_tags', function($join) use ($field_id) {
                            $join->on('tbl_recipes.id', '=', 'tbl_tags.recipe_id')->where('tbl_tags.id', '=', $field_id);
                        })
                        ->paginate(15);
            }
        } else {
            $result = tbl_recipes::search($keyword)->paginate(15);
        }

        $data = array(
            'recipe' => $result,
            'recent' => sRecipe::recent(),
            'categories' => sRecipe::getCategories(),
            'keyword' => $keyword,
            'tags' => sRecipe::getTags()
        );
        return view('search', $data);
        // }
    }

    function subscribe(Request $request) {
        $emailSubscribe = $request->emailSubscribe;
        if (!empty($emailSubscribe)) {
            $nl = new Newletter;

            $nl->email = $emailSubscribe;

            $nl->save();

            return redirect('/')->with('message', 'Thank You - your email subscribed successfully');
        }
    }

}
