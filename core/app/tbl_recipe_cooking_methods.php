<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_recipe_cooking_methods extends Model
{
    protected $table = 'tbl_recipe_cooking_methods';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'cooking_method_id', 'id');
    }
}
