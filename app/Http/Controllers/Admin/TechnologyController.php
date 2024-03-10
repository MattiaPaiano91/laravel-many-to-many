<?php

namespace App\Http\Controllers\admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Str;



class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $technologies = Technology::all();
         return view('admin.technologies.create',compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        
        $technologiesData = $request->validated();
        $slug = Str::slug($technologiesData['title']);
        $technologiesData['slug'] = $slug;
        $technologiesData['description'] = $request->input('description');
        $technology = Technology::create($technologiesData);
        return redirect()->route('admin.technologies.show', ['technology' => $technology->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
         $technology = Technology::where('slug', $slug)->firstOrFail();
         return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, string $slug)
    {
       $technologytData = $request->validated();
       $technology = Technology::where('slug', $slug)->firstOrFail();
       $slug = Str::slug($technologytData['title']);
       $technologytData['slug'] = $slug;
       $technology->updateOrFail($technologytData);
       return redirect()->route('admin.technologies.show', ['technology' => $technology->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
