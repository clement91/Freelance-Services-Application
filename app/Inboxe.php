<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inboxe extends Model
{
    //
    public function xusers()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }

    public function xjobs()
    {
        return $this->hasOne('App\Job', 'job_id', 'job_id');
    }
}
