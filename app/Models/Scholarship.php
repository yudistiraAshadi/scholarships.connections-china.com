<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use Searchable;


    /**
     * Relationships...
     */
    public function university()
    {
        return $this->belongsTo('App\Models\University');
    }

    public function programLanguage()
    {
        return $this->belongsTo('App\Models\Statics\ProgramLanguage');
    }

    public function scholarshipType()
    {
        return $this->belongsTo('App\Models\Statics\ScholarshipType');
    }

    public function degreeType()
    {
        return $this->belongsTo('App\Models\Statics\DegreeType');
    }


    /**
     * Custom Searchable methods for CustomTNTSearch
     */
    public function customSearchableAs()
    {
        return [
            'scholarships',
            'scholarships_program_only',
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
                    'program' => $this->program,
                ];
            default:
                return $this->toArray();
        }
    }
}
