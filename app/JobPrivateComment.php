<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPrivateComment extends Model
{
    //
    public function xusers()
    {
        return $this->hasOne('App\User', 'id', 'users');
    }
}
