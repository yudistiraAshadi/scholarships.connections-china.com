<?php

namespace App\Http\Controllers\Model\Statics;

use App\Models\Statics\DegreeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return DegreeType::all();
    }
}
