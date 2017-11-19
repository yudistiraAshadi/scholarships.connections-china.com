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
        $scholarshipTypesCollection = ScholarshipType::all();
        $universitiesCollection = University::all();
        $degreeTypesCollection = DegreeType::all();
        $programLanguagesCollection = ProgramLanguage::all();


        // Break down the models into array of strings
        $scholarshipTypes = [];
        foreach ($scholarshipTypesCollection as $scholarshipType) {
            $scholarshipTypes[] = $scholarshipType->type;
        };
        
        $universityNames = [];
        foreach ($universitiesCollection as $university) {
            $universityNames[] = $university->name;
        };

        $degreeTypes = [];
        foreach ($degreeTypesCollection as $degreeType) {
            $degreeTypes[] = $degreeType->type;
        };

        $programLanguages = [];
        foreach ($programLanguagesCollection as $programLanguage) {
            $programLanguages[] = $programLanguage->language;
        };
        

        // Return an array of search options
        return [
            'scholarship_types' => $scholarshipTypes,
            'university_names' => $universityNames,
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
        $universityNameRequest = $request->input('university_name');
        $degreeTypeRequest = $request->input('degree_type');
        $programLanguageRequest = $request->input('program_language');
        $programRequest = $request->input('program');


        // Search indices based on the input and combine all the results
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
