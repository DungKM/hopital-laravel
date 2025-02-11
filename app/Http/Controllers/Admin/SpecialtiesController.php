<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialtieStoreRequest;
use App\Models\Specialtie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialtie::all();
        return view('admin.pages.Specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialtieStoreRequest $request)
    {
        $slug = Str::slug($request->name);

        $validatedData = $request->validated();
        $validatedData['slug'] = $slug;
        $specialtie = Specialtie::create($validatedData);
        return redirect()->route('admin.specialties.index')->with('success', "Specialty {$specialtie->name} created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
