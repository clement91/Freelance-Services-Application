<?php

namespace App\Http\Controllers;

use Auth;
use DB;
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
        $out = [];
        $user_id = Auth::user()->id;

        //unread mail
        $out['unread'] = Inboxe::where('user', $user_id)
                          ->where('read_type', 0)
                          ->groupBy('job_id')
                          ->with('xusers')
                          ->with('xjobs')
                          ->get();

        $out['read'] = Inboxe::where('user', $user_id)
                          ->where('read_type', 1)
                          ->groupBy('job_id')
                          ->with('xusers')
                          ->with('xjobs')
                          ->get();

        //unread chat
        $out['unreadChat'] = DB::table('job_private_comments')
                              ->join('job_transactions', 'job_private_comments.job_transaction_id', '=', 'job_transactions.job_transaction_id')
                              ->join('jobs', 'job_transactions.job_id', '=', 'jobs.job_id')
                              ->join('users', 'job_private_comments.users', '=', 'users.id')
                              ->select('job_private_comments.*', 'jobs.title', 'jobs.description', 'users.name', 'job_transactions.job_id')
                              ->where('job_private_comments.read_type', 0)
                              ->groupBy('job_transaction_id')
                              ->get();

        $out['readChat'] = DB::table('job_private_comments')
                              ->join('job_transactions', 'job_private_comments.job_transaction_id', '=', 'job_transactions.job_transaction_id')
                              ->join('jobs', 'job_transactions.job_id', '=', 'jobs.job_id')
                              ->join('users', 'job_private_comments.users', '=', 'users.id')
                              ->select('job_private_comments.*', 'jobs.title', 'jobs.description', 'users.name', 'job_transactions.job_id')
                              ->where('job_private_comments.read_type', 1)
                              ->groupBy('job_transaction_id')
                              ->get();

        //return $out;
        return view('inbox', $out);
    }

    public function read_mail(Request $request)
    {
      $out = [];
      $job_id = $request->job_id;

      $mail = Inboxe::where('job_id', $job_id);
      $mail->update(['read_type' => 1]);

      $out['job'] = Job::where('job_id', $job_id)->first();
      $out['mail'] = $mail
                    ->with('xusers')
                    ->get();

      $out['type'] = 1;
      $out['id'] = $job_id;

      //return $out;
      return view('inbox_content', $out);
    }

    public function send_mail(Request $request)
    {
      $out = [];
      $job_id = $request->job_id;
      $msg = $request->msg;
      $user_id = Auth::user()->id;

      $new_inb = new Inboxe;
      $new_inb->job_id =$job_id;
      $new_inb->msg = $msg;
      $new_inb->job_owner = Job::where('job_id', $job_id)->pluck('users');
      $new_inb->user = $user_id;

      if($new_inb->save())
      {
        $out['comments'] = Inboxe::where('id', $new_inb->id)
                            ->with('xusers')
                            ->get();
      }

      //return $out;
      return view('private_comment_list', $out);
    }

    public function read_chat(Request $request)
    {
      $out = [];
      $job_transaction_id = $request->job_transaction_id;

      $mail = JobPrivateComment::where('job_transaction_id', $job_transaction_id);
      $mail->update(['read_type' => 1]);

      //$out['job'] = Job::where('job_id', $job_id)->first();
      $out['job'] = DB::table('job_private_comments')
                            ->join('job_transactions', 'job_private_comments.job_transaction_id', '=', 'job_transactions.job_transaction_id')
                            ->join('jobs', 'job_transactions.job_id', '=', 'jobs.job_id')
                            ->select('jobs.*')
                            ->first();
      $out['mail'] = $mail
                    ->with('xusers')
                    ->get();

      $out['type'] = 2;
      $out['id'] = $job_transaction_id;

      //return $out;
      return view('inbox_content', $out);
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
