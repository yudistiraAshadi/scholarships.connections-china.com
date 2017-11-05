<?php

namespace App\Http\Controllers\Search\Scholarship;

use App\Scholarship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function advancedSearch(Request $request)
    {
        /**
         * Assign request inputs to variables
         */
        $universityNameRequest = $request->input('university_name');
        $studentTypeRequest = $request->input('student_type');
        $scholarshipTypeRequest = $request->input('scholarship_type');
        $coursesRequest = $request->input('courses');


        /**
         * Search indices based on the input and combine all the results
         */
        $result = Scholarship::all();

        if (isset($universityNameRequest) && !empty($universityNameRequest)) {

            $universityName = Scholarship::search($universityNameRequest)
                ->within('scholarships_university_name_only')
                ->get();

            if (! empty($universityName)) {
                $result = $result->intersect($universityName);
            }
        }

        if (isset($studentTypeRequest) && !empty($studentTypeRequest)) {

            $studentType = Scholarship::search($studentTypeRequest)
                ->within('scholarships_student_type_only')
                ->get();

            if (! empty($studentType)) {
                $result = $result->intersect($studentType);
            }
        }
        
        if (isset($scholarshipTypeRequest) && !empty($scholarshipTypeRequest)) {

            $scholarshipType = Scholarship::search($scholarshipTypeRequest)
                ->within('scholarships_scholarship_type_only')
                ->get();
                
            if (! empty($scholarshipType)) {
                $result = $result->intersect($scholarshipType);
            }
        }
        
        if (isset($coursesRequest) && !empty($coursesRequest)) {

            $courses = Scholarship::search($coursesRequest)
                ->within('scholarships_courses_only')
                ->get();

            if (! empty($courses)) {
                $result = $result->intersect($courses);
            }
        }

        return $result->load('university');
    }
}
