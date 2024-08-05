<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseRequest\StoreCourseRequest;
use App\Http\Requests\CourseRequest\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function learnHtmlTopic()
    {
        $courses = Course::where('subject', 'html')->get();
        return view('livewire.courses.learn-html-topic', ['courses' => $courses]);
    }
    public function learnCssTopic()
    {
        $courses = Course::where('subject', 'css')->get();
        return view('livewire.courses.learn-css-topic', ['courses' => $courses]);
    }
    public function intro()
    {

        $courses = Course::all();
        return view('course', ['courses' => $courses]);
    }
    public function index()
    {

        $courses = Course::all();
        return view('teacher.courses.course-index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.courses.course-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $new = $request->all();
        $course = Course::create($new);
        $courses = Course::all();
        return view('teacher.courses.course-index', ['courses' => $courses]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }
    public function frontend()
    {
        return view('livewire.courses.frontend');
    }
    public function backend()
    {
        return view('livewire.courses.backend');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('teacher.courses.course-edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $new = $request->all();

        $res = $course->update($new);
        $courses = Course::all();
        return view('teacher.courses.course-index', ['courses' => $courses]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back();
    }
}
