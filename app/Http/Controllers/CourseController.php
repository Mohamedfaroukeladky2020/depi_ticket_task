<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Month;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();


        return view('users.index', compact('courses'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'label'=> 'required',
        'price'=> 'required',
        'title' => 'required',
        'description'=>'required',
        'image'=>'required |image |mimes:jpeg,png,jpg,gif,svg|max:2048',
        'master_image'=>'required |image |mimes:jpeg,png,jpg,gif,svg|max:2048',
        'master_name'=>'required',

       ]);

       $input=$request->all();

      if($image=$request->file('image')) {
          $path='/images';
          $name=date('YMDHiS').'.'.$image->getClientOriginalExtension();
          $image->move(public_path($path), $name);
          $input['image']=$name;

          if($images=$request->file(key: 'master_image')) {
            $paths='/image';
            $names=time().'.'.date('YMDHiS').'.'.$images->getClientOriginalExtension();
            $images->move(public_path($paths), $names);
            $input['master_image']=$names;
        }

      }

      Course::create($input);









       return redirect()->route(route: 'users.index')->with('success','Course created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('users.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
