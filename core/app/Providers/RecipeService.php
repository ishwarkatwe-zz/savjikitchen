<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Providers;

use Auth;
use App\User;
use App\tbl_recipe_categories;
use App\tbl_recipes;
use App\tbl_tags;
use DB;

/**
 * Description of RecipeService
 *
 * @author Happy
 */
class RecipeService {

    public static function getTags($intRecipeId = NULL) {
        if (!empty($intRecipeId)) {
            return tbl_tags::select(DB::raw('distinct(name),id'))->where('name', '!=', '')->where("recipe_id", "=", $intRecipeId)
                            ->orderBy('created_at', 'desc')->limit(20)->get()->toArray();
        } else {
            return tbl_tags::select(DB::raw('distinct(name),id'))->where('name', '!=', '')
                            ->orderBy('created_at', 'desc')->limit(20)->get()->toArray();
        }
    }

    public static function getCategories($limit = 6) {
        $categories = DB::table('tbl_recipes')
                ->select(DB::raw('count(category_id) as count, category_id'))
                ->where('active', '<>', 'N')
                ->orderBy('count', 'desc')
                ->groupBy('category_id')
                ->get();

        $id = array();
        foreach ($categories as $c) {
            $id[] = $c->category_id;
        }
        
        return tbl_recipe_categories::whereIn('id', $id)->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public static function recent($limit = 6) {
        return tbl_recipes::active()->orderBy('created_at', 'desc')->limit($limit)->get();
    }

}
