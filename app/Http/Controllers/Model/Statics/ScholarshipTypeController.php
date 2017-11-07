<?php

namespace App\Http\Controllers\Model\Statics;

use App\Models\Statics\ScholarshipType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipTypeController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     */
    public function index()
    {
        return ScholarshipType::all();
    }
}
