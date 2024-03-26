<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'slug' => 'required',
        ]);

        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['name']);

        $newProject = new Project();
        $newProject->fill($formData);
        $newProject->save();
        
        return redirect()->route('pages.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $projects = Project::where('slug', $slug)->firstOrFail();

        $projects->delete();

        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully.');
    }
}
