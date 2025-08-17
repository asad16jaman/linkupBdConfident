<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {

        $project = Project::latest()->get();
        return view('Admin.project.index', compact('project'));
    }

    public function store(Request $request)
    {

    \Log::info('Store Request Data:', $request->all());
        $request->validate([
            'title'          => 'required',
            'slug'           => 'nullable',
            'status'         => 'required',
            'type'           => 'required',
            'location'       => 'required',
            'map'            => 'required',
            'address'        => 'required',
            'land_area'      => 'required',
            'no_of_floor'    => 'required',
            'appartments'    => 'required',
            'no_of_parking'  => 'required',
            'flat_details'   => 'required',
            'features_details'   => 'required',
            'collection'     => 'required',
            'handover'       => 'required',
            'main_image'     => 'nullable|mimes:png,jpg,jpeg,webp',
            'details_image'  => 'nullable|mimes:png,jpg,jpeg,webp',
            'feature_image'  => 'nullable|mimes:png,jpg,jpeg,webp',
            'book_image'     => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $i = 1;
            while (Project::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            $project = new Project();
            $project->title         = $request->title;
            $project->slug          = $slug;
            $project->status        = $request->status;
            $project->type          = $request->type;
            $project->location      = $request->location;
            $project->map           = $request->map;
            $project->video         = $request->video;
            $project->address       = $request->address;
            $project->land_area     = $request->land_area;
            $project->no_of_floor   = $request->no_of_floor;
            $project->appartments   = $request->appartments;
            $project->no_of_parking = $request->no_of_parking;
            $project->flat_details  = $request->flat_details;
            $project->features_details  = $request->features_details;
            $project->collection    = $request->collection;
            $project->handover      = $request->handover;
            // Image uploads
            if ($request->hasFile('main_image')) {
                $project->main_image = $this->imageUpload($request, 'main_image', 'uploads/project');
            }
            if ($request->hasFile('details_image')) {
                $project->details_image = $this->imageUpload($request, 'details_image', 'uploads/project');
            }
            if ($request->hasFile('feature_image')) {
                $project->feature_image = $this->imageUpload($request, 'feature_image', 'uploads/project');
            }
            if ($request->hasFile('book_image')) {
                $project->book_image = $this->imageUpload($request, 'book_image', 'uploads/project');
            }

            $project->add_by     = Auth::user()->id;
            $project->ip_address = $request->ip();

            $project->save();

            return redirect()->route('project.index')->with('success', 'Project created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Project creation failed: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {

        $project = Project::find($id);
        $projects = Project::get();
        return view('Admin.project.edit', compact('project', 'projects'));
    }

    public function update($id, Request $request)
    {

        $this->validate(
            \request(),
            [
                'title'          => 'required',
                'slug'           => 'nullable',
                'status'         => 'required',
                'type'           => 'required',
                'location'       => 'required',
                'map'            => 'required',
                'address'        => 'required',
                'land_area'      => 'required',
                'no_of_floor'    => 'required',
                'appartments'    => 'required',
                'no_of_parking'  => 'required',
                'flat_details'   => 'required',
                'features_details'   => 'required',
                'collection'     => 'required',
                'handover'       => 'required',
                'main_image'     => 'nullable|mimes:png,jpg,jpeg,webp',
                'details_image'  => 'nullable|mimes:png,jpg,jpeg,webp',
                'feature_image'  => 'nullable|mimes:png,jpg,jpeg,webp',
                'book_image'     => 'nullable|mimes:png,jpg,jpeg,webp',

            ]
        );

        try {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $i = 1;
            while (Project::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            $project = Project::findOrFail($id);

            $project->title         = $request->title;
            $project->slug          = $slug;
            $project->status        = $request->status;
            $project->type          = $request->type;
            $project->location      = $request->location;
            $project->map           = $request->map;
            $project->video         = $request->video;
            $project->address       = $request->address;
            $project->land_area     = $request->land_area;
            $project->no_of_floor   = $request->no_of_floor;
            $project->appartments   = $request->appartments;
            $project->no_of_parking = $request->no_of_parking;
            $project->flat_details  = $request->flat_details;
            $project->features_details  = $request->features_details;
            $project->collection    = $request->collection;
            $project->handover      = $request->handover;

            // Image uploads
            if ($request->hasFile('main_image')) {
                if ($project->main_image && file_exists(public_path($project->main_image))) {
                    unlink(public_path($project->main_image));
                }
                $project->main_image = $this->imageUpload($request, 'main_image', 'uploads/project');
            }

            if ($request->hasFile('details_image')) {
                if ($project->details_image && file_exists(public_path($project->details_image))) {
                    unlink(public_path($project->details_image));
                }
                $project->details_image = $this->imageUpload($request, 'details_image', 'uploads/project');
            }

            if ($request->hasFile('feature_image')) {
                if ($project->feature_image && file_exists(public_path($project->feature_image))) {
                    unlink(public_path($project->feature_image));
                }
                $project->feature_image = $this->imageUpload($request, 'feature_image', 'uploads/project');
            }

            if ($request->hasFile('book_image')) {
                if ($project->book_image && file_exists(public_path($project->book_image))) {
                    unlink(public_path($project->book_image));
                }
                $project->book_image = $this->imageUpload($request, 'book_image', 'uploads/project');
            }
            $project->updated_by = Auth::user()->id;
            $project->ip_address = $request->ip();
            $project->update();
            return redirect()->route('project.index')->with('success', 'project  Update Successful');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', ' project Update failed');
        }
    }

    public function delete($id)
    {

        try {
            $project = Project::find($id);
            if (file_exists($project->main_image) && $project->image != null) {
                unlink($project->image);
            }
            if (file_exists($project->details_image) && $project->details_image != null) {
                unlink($project->details_image);
            }
            if (file_exists($project->feature_image) && $project->feature_image != null) {
                unlink($project->feature_image);
            }
            if (file_exists($project->book_image) && $project->book_image != null) {
                unlink($project->book_image);
            }
            $project->delete();
            return redirect()->route('project.index')->with('success', '    Project Deleted Successful');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Project Deleted failed');
        }
    }
}
