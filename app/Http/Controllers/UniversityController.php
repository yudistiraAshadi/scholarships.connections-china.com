<?php

namespace App\Http\Controllers;

use App\Models\University;

use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::find($id);

        return view('university.show-detail', [
            'university' => $university
        ]);
    }
}
