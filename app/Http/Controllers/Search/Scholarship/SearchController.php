<?php

namespace App\Http\Controllers\Search\Scholarship;

use App\Models\Scholarship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function advancedSearch(Request $request)
    {
        /**
         * Assign request inputs to variables
         */

        $scholarshipTypeRequest = $request->input('scholarship_type');
        $universityNameRequest = $request->input('university_name');
        $degreeTypeRequest = $request->input('degree_type');
        $programLanguageRequest = $request->input('program_language');
        $programRequest = $request->input('program');


        /**
         * Search indices based on the input and combine all the results
         */
        $result = Scholarship::all();

        if (isset($scholarshipTypeRequest) && !empty($scholarshipTypeRequest)) {
            
            $scholarshipType = Scholarship::search($scholarshipTypeRequest)
                ->within('scholarships_scholarship_type_only')
                ->get();
                
            if (! empty($scholarshipType)) {
                $result = $result->intersect($scholarshipType);
            }
        }

        if (isset($universityNameRequest) && !empty($universityNameRequest)) {

            $universityName = Scholarship::search($universityNameRequest)
                ->within('scholarships_university_name_only')
                ->get();

            if (! empty($universityName)) {
                $result = $result->intersect($universityName);
            }
        }

        if (isset($degreeTypeRequest) && !empty($degreeTypeRequest)) {

            $degreeType = Scholarship::search($degreeTypeRequest)
                ->within('scholarships_degree_type_only')
                ->get();

            if (! empty($degreeType)) {
                $result = $result->intersect($degreeType);
            }
        }
        
        if (isset($programLanguageRequest) && !empty($programLanguageRequest)) {
            
            $programLanguage = Scholarship::search($programLanguageRequest)
                ->within('scholarships_program_language_only')
                ->get();
                
            if (! empty($programLanguage)) {
                $result = $result->intersect($programLanguage);
            }
        }

        if (isset($programRequest) && !empty($programRequest)) {

            $program = Scholarship::search($programRequest)
                ->within('scholarships_program_only')
                ->get();

            if (! empty($program)) {
                $result = $result->intersect($program);
            }
        }

        // Return thre result's collection along with the relationships
        return $result->load(
            'university',
            'programLanguage',
            'scholarshipType',
            'degreeType'
        );
    }
}
