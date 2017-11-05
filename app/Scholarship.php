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
            'scholarships_university_name_only',
            'scholarships_student_type_only',
            'scholarships_scholarship_type_only',
            'scholarships_courses_only',
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
                    'university_name' => $this->university->name,
                ];
            case 2:
                return [
                    'id' => $this->id,
                    'student_type' => $this->student_type,
                ];
            case 3:
                return [
                    'id' => $this->id,
                    'scholarship_type' => $this->scholarship_type,
                ];
            case 4:
                return [
                    'id' => $this->id,
                    'courses' => $this->courses,
                ];
            default:
                return $this->toArray();
        }
    }
}
