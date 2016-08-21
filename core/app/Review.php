<?php

namespace App;
use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    protected $table = 'review';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable = ['name','email','contact','rating','feedback'];

}
