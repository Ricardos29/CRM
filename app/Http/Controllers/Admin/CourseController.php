<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    // List Courses
    public function index()
    {
        return view('admin.course.index');
    }

    // Create Course
    public function create()
    {
        return view('admin.course.create');
    }

    // Create Course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required'
        ]);

        if($validated) {
            $course = Course::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'body' => $request->body,
                'isActive' => $request->isActive ? 1 : 0
            ]);
            
            return redirect()->route('admin.course')->with('message', 'Course updated successfully');
        }

        return ['message' => 'Error'];
    }

    public function edit(Course $course)
    {        
        return view('admin.course.edit', compact('course'));
    }

    public function update($course, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required'
        ]);

        $course = Course::find($course);

        if($validated){
            $course = $course->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'body' => $request->body,
                'isActive' => $request->isActive ? 1 : 0,
            ]);
            return redirect()->route('admin.course')->with('message', 'Course updated successfully');
        }

        return ['message', 'Error'];
    }
}
