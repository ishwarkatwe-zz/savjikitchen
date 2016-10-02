<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Newletter
 *
 * @author Happy
 */
class Newletter extends Model {

    //put your code here
    protected $table = 'newletter';
    protected $primaryKey = 'id';
    protected $guarded = ['email'];
    protected $dates = ['created_at'];

}
