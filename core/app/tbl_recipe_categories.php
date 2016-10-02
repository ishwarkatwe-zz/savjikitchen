<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tbl_recipes;

class tbl_recipe_categories extends Model {

    protected $table = 'tbl_recipe_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id'];

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'category_id', 'id');
    }

    public function countRecipes($id) {
        $data = tbl_recipes::where('category_id', '=', $id)->count();
        return $data;
    }

}
