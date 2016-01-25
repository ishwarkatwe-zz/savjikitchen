<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\tbl_activities;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
