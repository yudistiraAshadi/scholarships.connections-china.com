<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
