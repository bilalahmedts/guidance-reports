<?php

namespace App\Http\Controllers\VoiceEvaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoiceEvaluationController extends Controller
{
    public function index()
    {
        return view('voice-evaluations.index');
    }
    
}
