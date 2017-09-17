<?php

namespace App\Http\Controllers;

use Auth;
use App\JobPublicComment;
use App\User;
use Illuminate\Http\Request;

class InboxController extends Controller
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
        return view('inbox');
    }

    public function add_comment_pub(Request $request)
    {
        $out = [];

        $new_jpc = new JobPublicComment;
        $new_jpc->job_transaction_id = $request->job_id;
        $new_jpc->rating = $request->rate;
        $new_jpc->msg = $request->msg;
        $new_jpc->users = $request->user;

        if($new_jpc->save())
        {
          $out['comment'] = JobPublicComment::where('id', $new_jpc->id)
                              ->with('xusers')
                              ->first();
        }

        return view('comment_list', $out);
    }
}
