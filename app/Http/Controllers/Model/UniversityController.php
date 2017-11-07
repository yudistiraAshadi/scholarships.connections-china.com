<?php

namespace App\Http\Controllers\Model;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    /**
     * Return a listing of the resource.
     */
    public function index()
    {
        return University::all();
    }
}
