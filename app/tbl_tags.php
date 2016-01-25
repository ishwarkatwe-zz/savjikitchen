<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_tags extends Model {

    protected $table = 'tbl_tags';
    protected $primaryKey = 'id';
    protected $fillable = ['recipe_id'];

    
    public function recipe() {
        return $this->belongsTo('App\tbl_recipes','recipe_id','id');
    }
}
