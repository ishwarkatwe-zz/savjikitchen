<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_cuisines extends Model {

    protected $table = 'tbl_cuisines';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'cuisine_id', 'id');
    }

}
