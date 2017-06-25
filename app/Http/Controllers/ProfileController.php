<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
      $user_id = Auth::user()->id;
      $user = User::where('id', $user_id)->first();
      //$out['name'] = $user->name;

      $profile = Profile::where('owner', $user_id)->first();

      $dir_tmp = public_path('img/profile');
      if(!file_exists($dir_tmp)){
        mkdir("img/". 'profile', 0777); //create tmp folder
      }

      if(file_exists(public_path('img/profile/') . $user_id. '.jpg')){
        $image = 'img/profile/' . $user_id. '.jpg';
      }else{
        $image = 'img/default.jpg';
      }

      $out = [
        'id' => $user_id,
        'name' => $user->name,
        'email' => $user->email,
        'contact_no' => $profile->contact_no,
        'address_1' => $profile->address_1,
        'address_2' => $profile->address_2,
        'city' => $profile->city,
        'postal_code' => $profile->postal_code,
        'country' => $profile->country,
        'desc' => $profile->desc,
        'image' => $image,

      ];

      //return $out;
      return view('profile', $out);
    }

    public function update(Request $request)
    {
      $out = 0;
      $id = $request->id;

      //update users table, email
      $user = User::where('id', $id);
      $user->update(['email' => $request->email ]);

      //update profile table
      $profile = Profile::where('owner', $id);
      $profile->update([
        'contact_no' => $request->contact,
        'address_1' => $request->address1,
        'address_2' => $request->address2,
        'city' => $request->city,
        'postal_code' => $request->postal_code,
        'country' => $request->country,
        'desc' => $request->desc

      ]);

      $time = date("His");
      $dir_img = $id. "-" .$time. ".jpg";

      //unlink profile folder
      $images = glob("img/profile/". $id. "-*.jpg");
      $dir_tmp = public_path("img/tmp/". $id. "-*.jpg");

      if($request->upload_value == 1){
        foreach ($images as $image){
          unlink($image); //delete
        }

        //unlink tmp folder
        $dir_img = "img/profile/". $dir_img;
        $images = glob("img/tmp/". $id. "-*.jpg");

        foreach ($images as $image){
          copy($image, $dir_img); //create
          unlink($image); //delete
        }

        //update users table
        $usr = User::where('id', $id);
        $usr->update(['image_url' => $dir_img ]);

        $out = $dir_img;
      }

      return $out;
    }

    public function update_password(Request $request)
    {
      $id = $request->id;
      $password = bcrypt($request->password);

      //update users password
      $user = User::where('id', $id);
      $user->update(['password' => $password ]);

      return 0;
    }

    public function validate_img(Request $request)
    {
        $errors = array();
        $allowed_mime = array('image/jpeg', 'image/jpg', 'image/gif');
        $mimetype = [];
        $filesize = 0;

        $user_id = Auth::user()->id;

        foreach ($request->file() as $file) {
            $src = $file->getPathName();
            $mimetype = $file->getClientMimeType();
            $filesize = $file->getClientSize();

            if (in_array($mimetype, $allowed_mime) === false) {
                $out = 'File type not allowed';
                return $out;
            }else if ($filesize > 2097152) {
                $out = 'File size must be under 2mb';
                return $out;
            }else{
              //all true
              //check temp folder exists
              $dir_tmp = public_path('img/tmp');
              if(!file_exists($dir_tmp)){
                mkdir("img/". 'tmp', 0777); //create tmp folder
              }

              $time = date("His");
              $dir_img = "img/tmp/". $user_id. "-" .$time. ".jpg";

              $images = glob("img/tmp/". $user_id. "-*.jpg");
              foreach ($images as $image){
                unlink($image); //delete
              }
              //echo($src);
              copy($src, $dir_img); //create

              //return 0;
              return $dir_img;

            }
        } //end foreach

        return 0;

    }

}
