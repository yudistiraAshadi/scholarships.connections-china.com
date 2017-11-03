<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

use App\Observers\UniversityObserver;

class University extends Model
{
    use Searchable;

    public static function boot()
    {
        parent::boot();

        parent::observe(UniversityObserver::class);
    }

    public function scholarships()
    {
        return $this->hasMany('App\Scholarship');
    }
}
