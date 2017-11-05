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
            'universities_name_only_asc',
            'universities_governing_district_only_asc'
        ];
    }

    public function customToSearchableArray($customSearchableAsIndex)
    {
        switch ($customSearchableAsIndex) {
            case 1:
                return [
                    'name' => $this->name,
                    'id' => $this->id, 
                ];
            case 2:
                return [
                    'governing_district' => $this->governing_district,
                    'id' => $this->id
                ];
            default:
                return $this->toArray();
        }
    }
}
