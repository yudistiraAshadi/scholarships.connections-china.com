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

    public function customSearchableAs()
    {
        return [
            'universities',
            'universities_name_only',
            'universities_governing_district_only'
        ];
    }

    public function customToSearchableArray($customSearchableAsIndex)
    {
        switch ($customSearchableAsIndex) {
            case 0:
                return $this->toArray();
            case 1:
                return [
                    'id' => $this->id, 
                    'name' => $this->name,
                ];
            case 2:
                return [
                    'id' => $this->id,
                    'governing_district' => $this->governing_district,
                ];
            default:
                return $this->toArray();
        }
    }
}
