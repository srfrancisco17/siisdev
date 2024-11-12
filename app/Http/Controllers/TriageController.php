<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TriageController extends Controller
{
    public function index(Request $request): View{

        return view("triage.index");
    }
}
