<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Change from all() to paginate()
        $projects = Project::paginate(10); // 10 items per page
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies_used' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_url' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
        ]);

        $project = new Project();
        $project->user_id = auth()->id(); // Assign the authenticated user's ID
        $project->title = $request->title;
        $project->description = $request->description;
        $project->technologies_used = $request->technologies_used;
        $project->project_url = $request->project_url;
        $project->featured = $request->has('featured') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('projects/thumbnails', 'public');
            $project->thumbnail = $thumbnailPath;
        }

        // Handle full image upload
        if ($request->hasFile('full_image')) {
            $fullImagePath = $request->file('full_image')->store('projects/images', 'public');
            $project->full_image = $fullImagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies_used' => 'nullable|string',
            'project_url' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->technologies_used = $request->technologies_used;
        $project->project_url = $request->project_url;
        $project->featured = $request->has('featured') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('projects/thumbnails', 'public');
            $project->thumbnail = $thumbnailPath;
        }

        // Handle full image upload
        if ($request->hasFile('full_image')) {
            // Delete old full image if exists
            if ($project->full_image && Storage::disk('public')->exists($project->full_image)) {
                Storage::disk('public')->delete($project->full_image);
            }
            $fullImagePath = $request->file('full_image')->store('projects/images', 'public');
            $project->full_image = $fullImagePath;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete associated images before deleting the project
        if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        if ($project->full_image && Storage::disk('public')->exists($project->full_image)) {
            Storage::disk('public')->delete($project->full_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}