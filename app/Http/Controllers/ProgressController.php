<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Http\Requests\ProgressRequest\StoreprogressRequest;
use App\Http\Requests\ProgressRequest\UpdateprogressRequest;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progresses = Progress::all();
        return view('progress', ['progresses' => $progresses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprogressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(progress $progress)
    {
        return view('progress_edit', ['progress' => $progress]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprogressRequest $request, progress $progress)
    {
        $new = $request->all();
        $progress->update($new);
        $progresses = Progress::all();
        return view('progress', ['progresses' => $progresses]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(progress $progress)
    {
        $progress->delete();
        return redirect()->back()->with('message', 'delete successful');
    }
}
