<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use Searchable;
    
    public function scholarships()
    {
        return $this->hasMany('App\Scholarship');
    }
}
