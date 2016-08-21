<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_recipe_ingredients extends Model {

    protected $table = 'tbl_recipe_ingredients';
    protected $primaryKey = 'id';
    protected $fillable = ['id','recipe_id','name','unit_id','quantity'];

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'recipe_id', 'id');
    }
    
    public function measure() {
        return $this->hasOne('App\tbl_measure_units', 'id', 'unit_id');
    }

}
