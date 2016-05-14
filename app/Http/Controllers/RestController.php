<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\tbl_recipes;
use Illuminate\Support\Facades\Input;

/**
 * Description of Front
 *
 * @author Alivenow
 */
class RestController extends Controller {

    public function getRecipes() {
        $sortby = Input::get('sortby');

        if ($sortby == "popular") {
            $recipes = tbl_recipes::with('user', 'category', 'like_count','comments', 'time', 'ingredients', 'ingredients.measure', 'instructions')
                    ->where('active', '=', 1)
                    ->orderBy('created_at', 'asc')
                    ->get();
        } else {
            $recipes = tbl_recipes::with('user', 'category', 'like_count','comments', 'time', 'ingredients', 'ingredients.measure', 'instructions')
                    ->where('active', '=', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
        }


        return response()->json($recipes);
    }

    public function getFilter() {

        $filterdata = Input::get('filter');

        $recipes = array();
        if ($filterdata) {
            $recipes = tbl_recipes::with('user', 'category')
                    ->where('name', 'like', '%' . $filterdata . '%')
                    ->take(2)
                    ->get();
        }
        return response()->json($recipes);
    }

}
