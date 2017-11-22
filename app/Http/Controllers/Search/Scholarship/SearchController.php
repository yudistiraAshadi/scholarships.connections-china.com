<?php

namespace App\Http\Controllers\Search\Scholarship;

use App\Models\Scholarship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Statics\DegreeType;
use App\Models\Statics\ProgramLanguage;
use App\Models\Statics\ScholarshipType;
use App\Models\University;

class SearchController extends Controller
{
    /**
     * Show the scholarship search page.
     *
     */
    public function index()
    {
        return view('search.scholarship');
    }


    /**
     * Return advenced search options needed to build form
     * for doing advanced scholarship searching
     * 
     */
    public function advancedSearchOptions()
    {
        // Get all the models related to the search options
        $scholarshipTypes = ScholarshipType::all();
        $universities = University::all();
        $degreeTypes = DegreeType::all();
        $programLanguages = ProgramLanguage::all();

        // Return an array of search options
        return [
            'scholarship_types' => $scholarshipTypes,
            'universities' => $universities,
            'degree_types' => $degreeTypes,
            'program_languages' => $programLanguages,
        ];
    }


    /**
     * Performed an advenced search for scholarship
     * 
     */
    public function advancedSearch(Request $request)
    {
        // Assign request inputs to variables
        $scholarshipTypeRequest = $request->input('scholarship_type');
        $universityRequest = $request->input('university');
        $degreeTypeRequest = $request->input('degree_type');
        $programLanguageRequest = $request->input('program_language');
        $programRequest = $request->input('program');


        // Search indices based on the input and combine all the results
        $result = Scholarship::orderBy('created_at', 'desc')->get();

        if ( isset($scholarshipTypeRequest) && !empty($scholarshipTypeRequest) ) {

            $result = $result->where('scholarship_type_id', $scholarshipTypeRequest);
        }

        if ( isset($universityRequest) && !empty($universityRequest) ) {

            $result = $result->where('university_id', $universityRequest);
        }

        if ( isset($degreeTypeRequest) && !empty($degreeTypeRequest) ) {

            $result = $result->where('degree_type_id', $degreeTypeRequest);
        }
        
        if ( isset($programLanguageRequest) && !empty($programLanguageRequest) ) {
            
            $result = $result->where('program_language_id', $programLanguageRequest);
        }

        if ( isset($programRequest) && !empty($programRequest) ) {

            $program = Scholarship::search($programRequest)
                ->within('scholarships_program_only')
                ->get();

            if ( !empty($program) ) {
                $result = $result->intersect($program);
            }
        }

        // Return thre result's collection along with the relationships
        return $result
            ->values()
            ->load(
                'university',
                'programLanguage',
                'scholarshipType',
                'degreeType'
            );
    }
}
