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
            'scholarships_scholarship_type_only',
            'scholarships_university_name_only',
            'scholarships_degree_type_only',
            'scholarships_program_language_only',
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
                    'scholarship_type' => $this->scholarshipType->type,
                ];
            case 2:
                return [
                    'id' => $this->id,
                    'university_name' => $this->university->name,
                ];
            case 3:
                return [
                    'id' => $this->id,
                    'degree_type' => $this->degreeType->type,
                ];
            case 4:
                return [
                    'id' => $this->id,
                    'program_language' => $this->programLanguage->language,
                ];
            case 5:
                return [
                    'id' => $this->id,
                    'program' => $this->program,
                ];
            default:
                return $this->toArray();
        }
    }
}
