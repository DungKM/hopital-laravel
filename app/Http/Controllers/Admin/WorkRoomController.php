<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkRoomStoreRequest;
use App\Models\WorkRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workrooms = WorkRoom::all();
        return view('admin.pages.WorkRooms.index', compact('workrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.WorkRooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRoomStoreRequest $request)
    {
        $slug = Str::slug($request->name);

        $validatedData = $request->validated();
        $validatedData['slug'] = $slug;
        WorkRoom::create($validatedData);
        return redirect()->route('admin.workrooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
