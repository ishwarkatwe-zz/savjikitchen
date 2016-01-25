<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_prepare_time extends Model
{
    protected $table = 'tbl_prepare_time';
    protected $primaryKey = 'id';
    protected $fillable = ['time'];
    
    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'preparation_time', 'id');
    }
}
