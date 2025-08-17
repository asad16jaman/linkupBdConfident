<?php

namespace App\Http\Controllers\Admin;

use App\Models\Director;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DirectorsController extends Controller
{
 public function index()
    {
        $directors = Director::latest()->get();
        return view('Admin.director.index', compact('directors'));
    }

    public function store(Request $request)
    {
        $this->validate(\request(),
            [
                'name'       => 'required',
                'designation' => 'required',
                'message' => 'required',
                'image'       => 'required|mimes:png,jpg,jpeg,webp'


            ]);
        try {
            $directors = new Director();
            $directors->name = $request->name;
            $directors->designation = $request->designation;
            $directors->message = $request->message;

            $directors->add_by = Auth::user()->id;
            $directors->ip_address = $request->ip();
            if ($request->hasFile('image')) {
            $directors->image = $this->imageUpload($request, 'image', 'uploads/directors');
            }
            $directors->save();
            return redirect()->route('directors.index')->with('success', 'Board of Directors Created Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Board of Directors created  failed');
        }

    }

    public function edit($id)
    {
        $director = Director::find($id);
        $directors = Director::get();
        return view('Admin.director.edit', compact('director', 'directors'));
    }

    
    public function update($id, Request $request)
    {

        $this->validate(\request(),
        [
            'name'       => 'required',
            'designation' => 'required',
            'message' => 'required',
            'image'       => 'nullable|mimes:png,jpg,jpeg,webp'

        ]);

        try {
            $directors = Director::find($id);
            $directors->name = $request->name;
            $directors->designation = $request->designation;
            $directors->message = $request->message;

            $directors->add_by = Auth::user()->id;
            $directors->ip_address = $request->ip();
             if ($request->hasFile('image')) {
             $directors->image = $this->imageUpload($request, 'image', 'uploads/directors');
            }
            $directors->update();
            return redirect()->route('directors.index')->with('success', 'Board of Directors Update Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', ' Board of Directors Update failed');
        }

    }

    public function delete($id)
    {

        try {
            $directors = Director::find($id);
             if (file_exists($directors->image) && $directors->image != null) {
                unlink($directors->image);
            }
            $directors->delete();
            return redirect()->route('directors.index')->with('success', ' Board of Directors Deleted Successful');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Board of Directors Deleted failed');
        }

    }
}
