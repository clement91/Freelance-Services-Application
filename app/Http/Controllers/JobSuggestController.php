<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\JobSuggest;
use Illuminate\Http\Request;

class JobSuggestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post_service');
    }

    public function add_suggest_job(Request $request)
    {
        $user_id = Auth::user()->id;
        $msg = $request->msg;

        //add new job suggest
        $new_js = new JobSuggest;
        $new_js->users = $user_id;
        $new_js->msg = $msg;

        $new_js->save();

        return 0;
    }

}
