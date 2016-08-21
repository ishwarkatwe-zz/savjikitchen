<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_recipe_instructions extends Model {

    protected $table = 'tbl_recipe_instructions';
    protected $primaryKey = 'id';
    protected $fillable = ['recipe_id'];

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'recipe_id', 'id');
    }

}
