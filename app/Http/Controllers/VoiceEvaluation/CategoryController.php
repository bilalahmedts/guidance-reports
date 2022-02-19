<?php

namespace App\Http\Controllers\VoiceEvaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function create()
    {
        return view('voice-evaluations.categories.create');
    }
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        Session::flash('success', 'Category added successfully!');
        return redirect()->route('voice-evaluations.index');
    }

}
