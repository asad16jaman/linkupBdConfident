<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $projects = Project::with('galleries')->latest()->get();
        $project = Project::latest()->get();
        return view('Admin.gallery.index', compact('projects', 'project'));
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'project_id' => 'required|exists:projects,id',
                'project_image.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            if ($request->hasFile('project_image')) {
                foreach ($request->file('project_image') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadPath = 'uploads/project_image/';
                    $file->move(public_path($uploadPath), $fileName);

                    Gallery::create([
                        'project_id'    => $request->project_id,
                        'project_image' => $uploadPath . $fileName,
                        'ip_address'    => $request->ip(),
                        'add_by'        => auth()->id(),
                    ]);
                }
            }

            return redirect()->route('gallery.index')->with('success', 'Project images created successfully.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($project_id)
    {
        $project = Project::find($project_id);
        if (!$project) {
            return redirect()->route('gallery.index')->with('error', 'Project not found.');
        }
        $galleryImages = Gallery::where('project_id', $project_id)->get();
        $projects = Project::with('galleries')->latest()->get();
        return view('Admin.gallery.edit', compact('project', 'projects', 'galleryImages'));
    }



    public function update(Request $request, $projectId)
    {
        try {
            $request->validate([
                'project_id' => 'required|exists:projects,id',
                'project_image.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            if ($request->project_id != $projectId) {
                return redirect()->back()->with('error', 'Project ID mismatch.');
            }

            Gallery::where('project_id', $projectId)->each(function ($gallery) {
                if (file_exists(public_path($gallery->project_image))) {
                    unlink(public_path($gallery->project_image));
                }
                $gallery->delete();
            });

            if ($request->hasFile('project_image')) {
                foreach ($request->file('project_image') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadPath = 'uploads/project_image/';
                    $file->move(public_path($uploadPath), $fileName);

                    Gallery::create([
                        'project_id'    => $projectId,
                        'project_image' => $uploadPath . $fileName,
                        'ip_address'    => $request->ip(),
                        'add_by'        => auth()->id(),
                    ]);
                }
            }

            return redirect()->route('gallery.index')->with('success', 'Project images updated successfully.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteAllByProject($project_id)
    {
        $images = Gallery::where('project_id', $project_id)->get();

        foreach ($images as $image) {
            if ($image->project_image && file_exists(public_path($image->project_image))) {
                unlink(public_path($image->project_image));
            }
            $image->delete();
        }

        return redirect()->route('gallery.index')->with('success', 'All images of this project deleted successfully.');
    }
}
