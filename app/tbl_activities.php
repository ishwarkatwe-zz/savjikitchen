<?php

namespace App;
use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class tbl_activities extends Model {

    protected $table = 'tbl_activities';
    protected $primaryKey = 'id';
    protected $fillable = ['action_by', 'action_type', 'user_id', 'recipe_id', 'comment'];
    protected $dates = ['deleted_at'];
    
    public function postedDate() {
        return date('d-M-Y',  strtotime($this->created_at));
    }
    
    public function following() {
        return User::find($this->user_id)->userName();
    }

    public function user() {
        return $this->belongsTo('App\User', 'action_by', 'id');
    }

    public function recipes() {
        return $this->hasOne('App\tbl_recipes', 'id', 'recipe_id');
    }

    public function time_ago() {
        $retval = '';
        $granularity = 1;
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
        $tp = ($retval != "") ? $retval : ' 0 seconds';
        return ' posted ' . $tp . ' ago';
    }

}
