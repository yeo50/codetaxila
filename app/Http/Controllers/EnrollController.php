<?php

namespace App\Http\Controllers;

use App\Models\enroll;
use App\Models\Progress;
use App\Http\Requests\EnrollRequest\StoreenrollRequest;
use App\Http\Requests\EnrollRequest\UpdateenrollRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function payment(Request $request)
    // {
    //     $course_name = $request->course_name;
    //     return view('livewire.courses.main');
    //  ['course_name' => $course_name]
    // }
    public function create(Request $request)
    {
        $new['student_id'] = Auth()->user()->student->id;
        $new['course'] = $request->course_name;
        $new['fee'] = 800;
        $discount = (int) $request->discount;
        $percentage = 800 * $discount / 100;
        $new['payment'] = 800 - $percentage;
        $progress = ['course' => $request->course_name, 'value' => 0, 'student_id' => Auth()->user()->student->id];
        DB::transaction(
            function () use ($progress, $new) {
                $newProgress = Progress::create($progress);
                $enroll = Enroll::create($new);
                if ($newProgress) {
                    dd($newProgress);
                } else {
                    if ($enroll->course == 'frontend') {
                        return view('livewire.courses.frontend');
                    }
                    if ($enroll->course == 'backend') {
                        return view('livewire.courses.backend');
                    }
                }
            }
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreenrollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(enroll $enroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateenrollRequest $request, enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(enroll $enroll)
    {
        //
    }
}
