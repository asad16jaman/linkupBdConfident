<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->get();
        return view('Admin.blog.index', compact('blog'));
    }

    public function store(Request $request)
    {
        $this->validate(
            \request(),
            [
                'title'              => 'required',
                'description'        => 'required',
                'image'              => 'required|mimes:png,jpg,jpeg,webp',
            ]
        );
        try {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->description = $request->description;

            $blog->add_by = Auth::user()->id;
            $blog->ip_address = $request->ip();
            if ($request->hasFile('image')) {
                $blog->image = $this->imageUpload($request, 'image', 'uploads/blog');
            }
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'Blog Created Successful');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', 'Blog created  failed');
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::get();
        return view('Admin.blog.edit', compact('blog', 'blogs'));
    }

    public function update($id, Request $request)
    {

        $this->validate(
            \request(),
            [
                'title'              => 'required',
                'description'        => 'required',
                // 'image'              => 'required|mimes:png,jpg,jpeg,webp',
            ]
        );

        try {
            $blog = Blog::findOrFail($id);
            $blog->title = $request->title;
            $blog->description = $request->description;

            $blog->add_by = Auth::user()->id;
            $blog->ip_address = $request->ip();
            if ($request->hasFile('image')) {
                $blog->image = $this->imageUpload($request, 'image', 'uploads/blog');
            }

            $blog->update();
            return redirect()->route('blogs.index')->with('success', 'Blog Update Successful');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Blog Update failed');
        }
    }

    public function delete($id)
    {

        try {
            $blog = Blog::find($id);
            if (file_exists($blog->image) && $blog->image != null) {
                unlink($blog->image);
            }
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', ' Blog  Deleted Successful');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Blog Deleted failed');
        }
    }
}
