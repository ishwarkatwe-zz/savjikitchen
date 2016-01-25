<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model {

    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    
    public function recipe() {
        return $this->belongsToMany('App\tbl_recipes', 'recipe_tags', 'recipe_id', 'tag_id');
    }
}
