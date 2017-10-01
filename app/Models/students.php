<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class students extends Model
{

    public function courses()
    {
        return $this->hasOne('App\Models\courses');
    }



}
