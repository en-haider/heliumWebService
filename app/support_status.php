<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support_status extends Model
{
    //


    public static function support()
    {
        return $self->hasMany(support::class);
        //return $this->hasMany('App\support_status','support_status_id','id');
    }


}
