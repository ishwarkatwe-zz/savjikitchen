<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_measure_units extends Model {

    protected $table = 'tbl_measure_units';
    protected $primaryKey = 'id';

    public function recipes() {
        return $this->belongsTo('App\tbl_recipe_ingredients', 'unit_id', 'id');
    }
}
