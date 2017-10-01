<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courses extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    public function students()
    {
        return $this->belongsTo('App\Models\students');
    }


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
