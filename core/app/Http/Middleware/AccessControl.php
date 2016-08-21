<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\tbl_recipes;
class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$intRecipeId = $request->id;
		if (!empty($intRecipeId)) {
			$row = tbl_recipes::where('id', $intRecipeId)
			->where('added_by', Auth::id())
			->exists();
            
			if($row){
				return $next($request);
			}
			else{
				return redirect('/');
			}
        }
		else{
            return redirect('/');
        }
        
    }
}
