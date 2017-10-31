<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $guarded = [];

    public function scholarships()
    {
        return $this->hasMany('App\Scholarship');
    }
}
