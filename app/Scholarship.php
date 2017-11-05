<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use Searchable;

    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function customSearchableAs()
    {
        return [
            'scholarships',
        ];
    }

    public function customToSearchableArray($customSearchableAsIndex)
    {
        switch ($customSearchableAsIndex) {
            default:
                $array = $this->toArray();

                return $array;
        }
    }
}
