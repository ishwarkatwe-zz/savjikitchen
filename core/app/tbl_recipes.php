<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use File;


class tbl_recipes extends Model {

    protected $table = 'tbl_recipes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'deleted_at'];

    public function recipeName() {
        return ucfirst($this->name);
    }

    public function recipeImage() {
        $image = $this->image;
        if (File::exists('core/public/img/' . $image) && !empty($image)) {
            $url = url('core/public/img/' . $this->image);
        } else {
            $url = url('core/public/default.png');
        }
        return $url;
    }
	
	public function addedOn() {
		$dt = $this->created_at;
		
		return date('d-M-Y',strtotime($dt));
	}

    public function catagoryNames($limit = NULL) {
        $category = array();

        if (!empty($this->category->name)) {
            $category[] = $this->category->name;
        }
        if (!empty($this->cuisine->name)) {
            $category[] = $this->cuisine->name;
        }
        if (!empty($this->cooking_method->name)) {
            $category[] = $this->cooking_method->name;
        }

        $string = implode(',', $category);
        if (empty($string)) {
            return $string;
        } else {
            return str_limit($string, $limit, $end = '...');
        }
    }


    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

    public function scopePopular($query)
    {
        return $query->where('like_count', '>', 2);
    }

	public function recipeNameTrim($limit = NULL) {
		$string = ucfirst($this->name);
        return str_limit($string, $limit, $end = '...');
    }
	
    public function ingredients() {
        return $this->hasMany('App\tbl_recipe_ingredients', 'recipe_id', 'id');
    }

    public function instructions() {
        return $this->hasMany('App\tbl_recipe_instructions', 'recipe_id', 'id');
    }

    public function category() {
        return $this->hasOne('App\tbl_recipe_categories', 'id', 'category_id');
    }

    public function cuisine() {
        return $this->hasOne('App\tbl_cuisines', 'id', 'cuisine_id');
    }

    public function cooking_method() {
        return $this->hasOne('App\tbl_recipe_cooking_methods', 'id', 'cooking_method_id');
    }

    public function time() {
        return $this->hasOne('App\tbl_prepare_time', 'id', 'preparation_time');
    }

    public function tags() {
        return $this->hasMany('App\tbl_tags', 'recipe_id', 'id');
    }

    public function like() {
        if(Auth::user()){
            return $this->hasOne('App\tbl_recipe_likes', 'recipe_id', 'id')->where('tbl_recipe_likes.user_id', '=', Auth::user()->id);
        }
        
    }

    public function like_count() {
        return $this->hasMany('App\tbl_recipe_likes', 'recipe_id', 'id')->where('tbl_recipe_likes.like', '=', 1);
    }

    public function views() {
        return $this->hasMany('App\View', 'recipe_id', 'id')->count();
    }
    
    public function likes() {
        return $this->hasMany('App\tbl_recipe_likes', 'recipe_id', 'id');
    }

    public function comments() {
        return $this->hasMany('App\tbl_recipe_comments', 'recipe_id', 'id')->orderBy('created_at', 'asc');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'added_by');
    }

    public function myRecipes($flag, $userId = NULL) {
        if (empty($userId)) {
            $userId = Auth::user()->id;
        }
        if ($flag == 1) {
            return tbl_recipes::where('added_by', '=', $userId)->where('active', '=', 1)->count();
        } else {
            return tbl_recipes::where('added_by', '=', $userId)->where('active', '=', 1)->get();
        }
    }

    public function activities() {
        return $this->belongsTo('App\tbl_activities', 'id', 'recipe_id');
    }

    public function tag() {
        return $this->belongsToMany('App\tags', 'recipe_tags', 'recipe_id', 'tag_id');
    }

    public function scopeSearch($query, $searchTerm) {
        return $query
            ->where('name', 'like', "%" . $searchTerm . "%")
            ->orWhere('description', 'like', "%" . $searchTerm . "%")
            ->orWhere('note', 'like', "%" . $searchTerm . "%");
    }

}
