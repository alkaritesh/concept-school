<?php

namespace SchoolDays\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

    public function user(){
      return $this->belongsToMany('SchoolDays\School','school_users');
    }
}
