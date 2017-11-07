<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * Relationships...
     */
    public function scholarships()
    {
        return $this->hasMany('App\Models\Scholarship');
    }
}
