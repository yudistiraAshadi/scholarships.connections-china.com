<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
