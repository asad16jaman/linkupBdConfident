<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OurStoryController extends Controller
{
   public function index()
    {
        $story = Story::latest()->get();
        return view('Admin.story.index', compact('story'));
    }

    public function store(Request $request)
    {
        $this->validate(\request(),
            [
                'title'       => 'required',
                'description' => 'required',
                'image'       => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        try {
            $story = new Story();
            $story->title = $request->title;
            $story->description = $request->description;

            $story->add_by = Auth::user()->id;
            $story->ip_address = $request->ip();
            if ($request->hasFile('image')) {
             $story->image = $this->imageUpload($request, 'image', 'uploads/story');
            }
            $story->save();
            return redirect()->route('story.index')->with('success', 'Story Created Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Story created  failed');
        }

    }

    public function edit($id)
    {
        $story = Story::find($id);
        $stories = Story::get();
        return view('Admin.story.edit', compact('story', 'stories'));
    }

    public function update($id, Request $request)
    {

        $this->validate(\request(),
        [
            'title'       => 'required',
            'description' => 'required',
            'image'       => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        try {
            $story = Story::find($id);
            $story->title = $request->title;
            $story->description = $request->description;

            $story->add_by = Auth::user()->id;
            $story->ip_address = $request->ip();
            // Handle image uploads individually
            if ($request->hasFile('image')) {
             $story->image = $this->imageUpload($request, 'image', 'uploads/story');
            }

            $story->update();
            return redirect()->route('story.index')->with('success', 'Our Story Update Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', ' Our Story Update failed');
        }

    }

    public function delete($id)
    {

        try {
            $story = Story::find($id);
            if (file_exists($story->image) && $story->image != null) {
                unlink($story->image);
            }
            $story->delete();
            return redirect()->route('story.index')->with('success', ' Story Deleted Successful');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Story Deleted failed');
        }

    }
}
