<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Http\Requests\AssignmentRequest\StoreAssignmentRequest;
use App\Http\Requests\AssignmentRequest\UpdateAssignmentRequest;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function doAssignment()
    {
        $assignments = Assignment::all();
        return view('assignment', ['assignments' => $assignments]);
    }
    public function index()
    {
        $assignments = Assignment::all();
        // return view('assignment', ['assignments' => $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assignments = Assignment::all();
        return view('teacher.assignment', ['assignments' => $assignments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        return view('teacher.assignment_edit', ['assignment' => $assignment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $new = $request->all();
        $res = $assignment->update($new);
        if ($res) {
            return redirect()->route('assignments.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->back();
    }
}
