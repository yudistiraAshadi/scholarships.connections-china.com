<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $universities = University::all();

        return view('homepage', [
            'universities' => $universities
        ]);
    }
}
