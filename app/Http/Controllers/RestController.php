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
        $recipes = tbl_recipes::with('user', 'category', 'like_count', 'time', 'ingredients', 'ingredients.measure', 'instructions')->get();
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
