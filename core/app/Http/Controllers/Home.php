<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\tbl_activities;
use App\Review;

class Home extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($userId = NULL) {
        if (!empty($userId) && $userId != Auth::user()->id) {
            $user = User::find($userId);
        } else {
            $user = Auth::user();
        }
        
        $following = $user->following;
        $arrFollowing = array();
        $arrFollowing[] = $user->id;
        foreach ($following as $follow) {
            $arrFollowing[] = $follow->userInfo->id;
        }
        $strFollowing = implode(',', $arrFollowing);

        $activities = tbl_activities::whereRaw('( action_by IN (' . $strFollowing . ') or user_id IN (' . $strFollowing . ')) and active=1')->orderBy('created_at', 'desc')->simplePaginate(10);


        if (!empty($activities)) {
            $activities->setPath('');
        }

        return view('pages.home', array('user' => $user, 'activities' => $activities));
    }

    public function about() {
        return view('pages.about', array());
    }

    public function contact(Request $request) {$data = $request->session()->all();
		$message = $request->session()->get('message', '');
		return view('pages.contact', array('message'=>$message));
    } 
	
	public function saveReview(Request $request) {
		$data_log = array(
			'name' => $request->name,
			'email' => $request->email,
			'rating' => $request->rating,
			'feedback' => $request->feedback,
			'contact' => $request->contact,
			'created_at' => time()
		);
		Review::firstOrCreate($data_log);
		
		return redirect('/contact')->with("message","Thanks for your patience we have received your feedback successfully.");
    }

}
