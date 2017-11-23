<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Statics\DegreeType;
use App\Models\Statics\ProgramLanguage;
use App\Models\Statics\ScholarshipType;
use App\Models\University;

class HomepageController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the models related to the search options
        $scholarshipTypes = ScholarshipType::all();
        $universities = University::all();
        $degreeTypes = DegreeType::all();
        $programLanguages = ProgramLanguage::all();

        // Return Homepage with array of search options
        return view('homepage', [
            'scholarshipTypes' => $scholarshipTypes,
            'universities' => $universities,
            'degreeTypes' => $degreeTypes,
            'programLanguages' => $programLanguages,
        ]);
    }
}
