<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of View
 *
 * @author Happy
 */
class View extends Model {

    //put your code here
    protected $table = 'views';
    protected $primaryKey = 'cip';
    protected $guarded = ['id'];
    protected $dates = ['created_at'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
