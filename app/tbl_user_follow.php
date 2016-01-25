<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_user_follow extends Model
{
    protected $table = 'tbl_user_follow';
    protected $primaryKey = 'id';
    protected $fillable = ['following_id','user_id'];

    
    public function user() {
        return $this->belongsTo('App\User','id','user_id');
    }
    
    public function userInfo() {
        return $this->hasOne('App\User', 'id', 'following_id');
    }
}
