<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\GradeRequest\StoreGradeRequest;
use App\Http\Requests\GradeRequest\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $grades = Grade::all();
        return view('grades', ['grades' => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.grades.grades_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $new = $request->all();
        $grade = Grade::create($new);
        // return view('grades')->with('message', 'grade created successfully');
        // with method  only work with redirect
        return redirect()->route('grades.index')->with('message', 'grade created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('livewire.grades.grades_edit', ['grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $new = $request->all();
        $grade->update($new);
        return redirect()->route('grades.index')->with('message', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('message', 'delete success');
    }
}
