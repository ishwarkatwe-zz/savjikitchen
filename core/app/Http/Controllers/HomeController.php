<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\tbl_recipe_categories;
use App\tbl_recipes;

class HomeController extends Controller {

    public function home() {
        $data = array(
            'categories' => tbl_recipe_categories::all(),
            'recipes' => tbl_recipes::active()->orderBy('created_at','desc')->limit(6)->get()
        );
        return view('home', $data);
    }

    
    public function viewDetail(Request $request) {
        $intRecipeId = $request->id;
        if(!empty($intRecipeId)){
            $data = array(
                'recipe' => tbl_recipes::find($intRecipeId)
            );
            return view('viewDetail', $data);
        }
       
    }

}
