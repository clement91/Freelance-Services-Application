<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Job;
use App\Profile;
use App\JobCategory;
use App\JobTransaction;
use App\Location;
use App\JobPublicComment;
use Illuminate\Http\Request;


class ServiceController extends Controller
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

        //get open job
        $jobs = Job::where('users', $user_id);
        $jobs_g = $jobs->get();
        if($jobs_g->count()){
          foreach($jobs_g as $key=>$job){
            $out['openJobs'][$key]['job_id'] = $job->job_id;
            $out['openJobs'][$key]['title'] = $job->title;
            $out['openJobs'][$key]['desc'] = $job->description;

            $Year = $job->created_at->format('Y');
            $Month = $job->created_at->format('M');
            $Date = $job->created_at->format('d');

            $out['openJobs'][$key]['date'] = $Date;
            $out['openJobs'][$key]['month'] = $Month;
            $out['openJobs'][$key]['year'] = $Year;
          }
        }
        else
        {
          $out['openJobs'] = null;
        }

        //get pending job
        $jobs_ids = $jobs->pluck('job_id');
        $jobs_g = JobTransaction::where('status', 'Pending')
                    ->whereIn('job_id', $jobs_ids)
                    ->get();

        if($jobs_g->count()){
          foreach($jobs_g as $key=>$job){

            $jbs = Job::where('job_id', $job->job_id)->first();
            $customer = User::where('id', $job->customer_id)->first();

            $out['pendingJobs'][$key]['raw_id'] = $jbs->id;
            $out['pendingJobs'][$key]['id'] = $job->id;
            $out['pendingJobs'][$key]['job_id'] = $job->job_id. $job->id;
            $out['pendingJobs'][$key]['title'] = $jbs->title;
            $out['pendingJobs'][$key]['customer_name'] = $customer->name;

            $Year = $job->created_at->format('Y');
            $Month = $job->created_at->format('M');
            $Date = $job->created_at->format('d');

            $out['pendingJobs'][$key]['date'] = $Date;
            $out['pendingJobs'][$key]['month'] = $Month;
            $out['pendingJobs'][$key]['year'] = $Year;
          }
        }
        else
        {
          $out['pendingJobs'] = null;
        }

        //get in progress job
        $jobs_ids = $jobs->pluck('job_id');
        $jobs_g = JobTransaction::where('status', 'Progress')
                    ->whereIn('job_id', $jobs_ids)
                    ->get();

        if($jobs_g->count()){
          foreach($jobs_g as $key=>$job){

            $jbs = Job::where('job_id', $job->job_id)->first();
            $customer = User::where('id', $job->customer_id)->first();

            $out['inprogressJobs'][$key]['id'] = $job->id;
            $out['inprogressJobs'][$key]['job_id'] = $job->job_id. $job->id;
            $out['inprogressJobs'][$key]['title'] = $jbs->title;
            $out['inprogressJobs'][$key]['customer_name'] = $customer->name;
            $out['inprogressJobs'][$key]['progress_status'] = $job->progress_status;

            $Year = $job->created_at->format('Y');
            $Month = $job->created_at->format('M');
            $Date = $job->created_at->format('d');

            $out['inprogressJobs'][$key]['date'] = $Date;
            $out['inprogressJobs'][$key]['month'] = $Month;
            $out['inprogressJobs'][$key]['year'] = $Year;
          }
        }
        else
        {
          $out['inprogressJobs'] = null;
        }

        //get close job
        $jobs_ids = $jobs->pluck('job_id');
        $jobs_g = JobTransaction::whereIn('status', ['Closed', 'Rejected', 'Refunded'])
                    ->whereIn('job_id', $jobs_ids)
                    ->orderBy('Status')
                    ->get();

        if($jobs_g->count()){

          foreach($jobs_g as $key=>$job){

            $jbs = Job::where('job_id', $job->job_id)->first();
            $customer = User::where('id', $job->customer_id)->first();

            $out['closeJobs'][$key]['job_id'] = $job->job_id. $job->id;
            $out['closeJobs'][$key]['title'] = $jbs->title;
            $out['closeJobs'][$key]['customer_name'] = $customer->name;
            $out['closeJobs'][$key]['status'] = $job->status;

            $Year = $job->created_at->format('Y');
            $Month = $job->created_at->format('M');
            $Date = $job->created_at->format('d');

            $out['closeJobs'][$key]['date'] = $Date;
            $out['closeJobs'][$key]['month'] = $Month;
            $out['closeJobs'][$key]['year'] = $Year;
          }
        }
        else
        {
          $out['closeJobs'] = null;
        }

        //return $out;
        return view('service', $out);
    }


    public function add_new_service()
    {
        $out = [];

        $jobcat_g = JobCategory::get();
        if($jobcat_g->count()){
          foreach($jobcat_g as $key=>$jobcat){
            $out['jobCategory'][$key]['id'] = $jobcat->id;
            $out['jobCategory'][$key]['parent'] = $jobcat->parent_category;
            $out['jobCategory'][$key]['child'] = $jobcat->child_category;
          }
        }

        $loc_g = Location::get();
        if($loc_g->count()){
          foreach($loc_g as $key=>$loc){
            $out['location'][$key]['id'] = $loc->id;
            $out['location'][$key]['location'] = $loc->location;
          }
        }

        //return $out;
        return view('add_new_service', $out);
    }

    public function validate_img(Request $request)
    {

      return 0;
    }


    public function find_service()
    {
        $out = [];

        $out['jobCategory'] = JobCategory::All();
        $out['location'] = Location::All();

        return view('find_service', $out);
    }

    public function submit_job(Request $request)
    {
      $user_id = Auth::user()->id;

      if($request->id != null)
      {
        $ujob = Job::where('id', $request->id);
        $ujob->update([
          'description' =>  $request->desc,
          'category' =>  $request->category,
          'price' =>  $request->price,
          'instruction' =>  $request->instruction,
          'tags' =>  $request->tags,
          'location' =>  $request->location,
          'days_to_deliver' =>  $request->days,
          'image_path' =>  $request->images,
          'url_link' =>  $request->links,
          'max' =>  $request->max,
          'email' =>  $request->email,
          'sms' =>  $request->sms,

        ]);

        return $ujob->pluck('job_id');
      }
      else
      {
        $new_job = new Job;
        $new_job->title = $request->title;
        $new_job->description = $request->desc;
        $new_job->category = $request->category;
        $new_job->price = $request->price;
        $new_job->instruction = $request->instruction;
        $new_job->tags = $request->tags;
        $new_job->location = $request->location;
        $new_job->days_to_deliver = $request->days;
        $new_job->image_path = $request->images;
        $new_job->url_link = $request->links;
        $new_job->max = $request->max;
        $new_job->email = $request->email;
        $new_job->sms = $request->sms;
        $new_job->users = $user_id;

        if($new_job->save()){
          //get datetime & update job id
          date_default_timezone_set('asia/singapore');

          $date = date("YmdHis");
          //$time = date("His");

          $job_id = $date .$new_job->id;
          $Job = Job::where('id', $new_job->id);
          $Job->update(['job_id' =>  $job_id ]);

          return $job_id;
        }
      }

      return 0;
    }

    public function view_job(Request $request)
    {
        $out = [];

        $out['job'] = Job::where('job_id', $request->id)->first();
        $out['jobCategory'] = JobCategory::All();
        $out['location'] = Location::All();

        //return $out;
        return view('view_service', $out);
    }

    public function find_job(Request $request)
    {
        $out = [];

        $keyword = $request->keyword;
        $location = explode(",", str_replace(' ', '', $request->location));

        if ($request->categories != "Nothing selected") { $categories = str_replace(", ", " ", $request->categories); } else { $categories = ""; }
        if ($request->price != "") { $price = explode("-", $request->price); } else { $price = explode("-", "0-99999"); }

        $keyword .= $categories;
        $location_ids = Location::whereIn('location' , $location)
                        ->pluck('id')
                        ->all();

        // keyword
        $out['jobs'] = Job::search($keyword, null, true)
                        ->whereBetween('price', $price)
                        ->whereIn('location', $location_ids)
                        ->with('xusers')
                        ->with('xcategory')
                        ->with('xlocation')
                        ->with('xpubComments')
                        ->get();

        $out['users'] = User::all();

        //return $out;
        return view('onload_service', $out);
    }

    public function onload_job()
    {
      $out = [];
      $out['jobs'] = Job::All();

      return view('onload_service', $out);
    }

    public function view_profile(Request $request)
    {
      $out = [];

      $job_f = Job::where('id', $request->id)->first();
      $user_id = $job_f->users;

      $user_f = User::where('id', $user_id)->first();
      $cat_f = JobCategory::where('id', $job_f->category)->first();
      $location_f = Location::where('id', $job_f->location)->first();

      $out['comment_pub'] = JobPublicComment::where('job_transaction_id', $job_f->job_id)
                              ->with('xusers')
                              ->orderBy('created_at', 'desc')
                              ->get();

      $profile = Profile::where('owner', $user_id)->first();
      $out['profile'] = [
        'joined_at' => $profile->created_at->format('d M Y'),
        'desc' => $profile->desc,
        'contact_no'  => $profile->contact_no
      ];

      $out['view'] = $request->view;

      $out['job'] = [
        'name' => $user_f->name,
        'email' => $user_f->email,
        'image_url' => $user_f->image_url,
        'job_id' => $job_f->job_id,
        'title' => $job_f->title,
        'desc' => $job_f->description,
        'parent_category' => $cat_f->parent_category,
        'child_category' => $cat_f->child_category,
        'price' => $job_f->price,
        'instruction' => $job_f->instruction,
        'days_to_deliver' => $job_f->days_to_deliver,
        'tags' => $job_f->tags,
        'location' => $location_f->location,
        'url_link' => $job_f->url_link,
        'hyperlink' => 'http://'. $job_f->url_link,
        'max_job' => $job_f->max,
        'user' => $user_id,
      ];

      //return $out;
      return view('profile_service', $out);
    }

    public function request_job(Request $request)
    {
      //pending -> accept -> payment_received -> start -> In Progress -> close
      //pending -> rejected

      $user_id = Auth::user()->id;
      $job_f = Job::where('job_id', $request->job_id)->first();

      $new_jobtrans = new JobTransaction;
      $new_jobtrans->job_id = $request->job_id;
      //$new_jobtrans->job_transaction_id = bin2hex(random_bytes(10));
      $new_jobtrans->status = 'Pending';
      $new_jobtrans->progress_status = 0;
      $new_jobtrans->price = $job_f->price;
      $new_jobtrans->customer_id = $user_id;

      if($new_jobtrans->save())
      {
        $jobtrans = JobTransaction::where('id', $new_jobtrans->id);
        $jobtrans->update(['job_transaction_id' =>  $request->job_id. $new_jobtrans->id ]);
      }

      return view('payment_success');
    }

    public function accept_job(Request $request)
    {
       $jobtrans = JobTransaction::where('id', $request->id);
       $jobtrans->update(['status' =>  'Progress' ]);

        //return $out;
        return 0;
    }

    public function reject_job(Request $request)
    {
      $jobtrans = JobTransaction::where('id', $request->id);
      $jobtrans->update(['status' =>  'Rejected' ]);

        //return $out;
        return 0;
    }

    public function refund_job(Request $request)
    {
      $jobtrans = JobTransaction::where('id', $request->id);
      $jobtrans->update(['status' =>  'Refunded' ]);

        //return $out;
        return 0;
    }

    public function update_job_progress(Request $request)
    {
      $jobtrans = JobTransaction::where('id', $request->id);
      $jobtrans->update(['progress_status' =>  $request->value ]);

      return 0;
    }

    public function add_payment(Request $request)
    {
       $out = [];
       $user_id = Auth::user()->id;

       $job = Job::where('job_id', $request->job_id)->first();

       $out['job'] = $job;
       $out['buyer'] = User::where('id', $user_id)
                          ->with('xprofile')
                          ->first();
       $out['seller'] = User::where('id', $job->users)
                         ->with('xprofile')
                         ->first();

        //return $out;
        return view('payment', $out);
    }


    public function getUpload()
    {
        return 0;
    }

    public function postUpload()
    {
        return 0;
    }

    public function deleteUpload()
    {
        return 0;
    }
}
