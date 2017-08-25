<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Job;
use App\JobCategory;
use App\Location;
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
        $jobs_g = Job::where('users', $user_id)->get();
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

          $date = date("Ymd");
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
        $price = $request->price;
        $categories = $request->categories;
        $location = $request->location;

        $out['keyword'] = $keyword;
        $out['price'] = $price;
        $out['categories'] = $categories;
        $out['location'] = $location;

        return $out;
        return view('view_service', $out);
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
