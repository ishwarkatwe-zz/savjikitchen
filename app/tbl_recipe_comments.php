<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_recipe_comments extends Model {

    protected $table = 'tbl_recipe_comments';
    protected $primaryKey = 'id';

    public function recipes() {
        return $this->belongsTo('App\tbl_recipes', 'recipe_id', 'id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    
    public function time_ago() {
        $retval = '';
        $granularity = 2;
        $date = strtotime($this->created_at);
        $difference = time() - $date;
        $periods = array('decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'minute' => 60,
            'second' => 1);

        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference / $value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '') . $time . ' ';
                $retval .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == '0') {
                break;
            }
        }
        $tp = ($retval!="")?$retval:' 0 seconds';
        return ' posted ' . $tp . ' ago';
    }

}
