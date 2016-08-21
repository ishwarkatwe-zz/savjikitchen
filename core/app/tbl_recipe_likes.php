<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_recipe_likes extends Model
{
    protected $table = 'tbl_recipe_likes';
    protected $primaryKey = 'id';
    protected $fillable = ['recipe_id','user_id','like'];

    
    public function recipe() {
        return $this->belongsTo('App\tbl_recipes','recipe_id','id');
    }
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
