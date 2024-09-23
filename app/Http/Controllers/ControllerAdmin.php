<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.home',compact('courses'));
    }
}
