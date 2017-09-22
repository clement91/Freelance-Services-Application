<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\Inboxe;
use App\JobPublicComment;
use App\JobPrivateComment;
use App\User;
use Illuminate\Http\Request;
date_default_timezone_set('Asia/Singapore');

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

    public function add_private_pub(Request $request)
    {
        $out = [];
        $user_id = Auth::user()->id;

        $new_jpc = new JobPrivateComment;
        $new_jpc->job_transaction_id = $request->job_id;
        $new_jpc->msg = $request->msg;
        $new_jpc->users = $user_id;

        if($new_jpc->save())
        {
          $out['comments'] = JobPrivateComment::where('id', $new_jpc->id)
                              ->with('xusers')
                              ->get();
        }

        return view('private_comment_list', $out);
    }

    public function get_private_pubs(Request $request)
    {
        $out = [];
        $jpc = JobPrivateComment::where('job_transaction_id', $request->job_id)
                ->with('xusers')
                ->get();

        if($jpc->count())
        {
          $out['comments'] = $jpc;
          return view('private_comment_list', $out);
        }
        else
        {
          return null;
        }

    }

    public function send_ps_msg(Request $request)
    {

      $job_f = Job::where('job_id', $request->job_id)->first();

      $new_inb = new Inboxe;
      $new_inb->job_id = $request->job_id;
      $new_inb->read_type = 0; // unread
      $new_inb->inbox_type = 0; // public
      $new_inb->msg = $request->msg;
      $new_inb->priority = 0; // 'not important
      $new_inb->job_owner = $job_f->users;
      $new_inb->user = $request->user;

      $new_inb->save();

      return 0;
    }

}
