<?php

namespace App\Http\Controllers\Model\Statics;

use App\Models\Statics\ProgramLanguage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramLanguageController extends Controller
{
    /**
     * return a listing of the resource.
     *
     */
    public function index()
    {
        return ProgramLanguage::all();
    }
}
