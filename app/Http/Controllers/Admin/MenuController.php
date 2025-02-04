<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuStoreRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::where('parent_id', null)
            ->with('children')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.pages.Menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('parent_id', null)->get();
        return view('admin.pages.Menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $slug = Str::slug($request->name);

        $validatedData = $request->validated();
        $validatedData['slug'] = $slug;
        Menu::create($validatedData);

        return redirect()->route('admin.menus.index');
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
