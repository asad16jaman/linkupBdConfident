<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsEventController extends Controller
{
    public function index()
    {
        $newsEvent = NewsEvent::latest()->get();
        return view('Admin.NewsEvent.index', compact('newsEvent'));
    }

    public function store(Request $request)
    {
        $this->validate(
            \request(),
            [
                'title'              => 'required',
                'date'               => 'required',
                'type'               => 'required',
                'description'        => 'required',
                'image'              => 'required|mimes:png,jpg,jpeg,webp',
            ]
        );
        try {
            $newsEvent = new NewsEvent();
            $newsEvent->title = $request->title;
            $newsEvent->date = $request->date;
            $newsEvent->type = $request->type;
            $newsEvent->description = $request->description;

            $newsEvent->add_by = Auth::user()->id;
            $newsEvent->ip_address = $request->ip();
            if ($request->hasFile('image')) {
                $newsEvent->image = $this->imageUpload($request, 'image', 'uploads/newsEvent');
            }
            $newsEvent->save();
            return redirect()->route('newsEvent.index')->with('success', 'News & Events Created Successful');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'News & Events created  failed');
        }
    }

    public function edit($id)
    {
        $newsEvent = NewsEvent::find($id);
        $newsEvents = NewsEvent::get();
        return view('Admin.NewsEvent.edit', compact('newsEvent', 'newsEvents'));
    }
    public function update($id, Request $request)
    {

        $this->validate(
            \request(),
            [
                 'title'              => 'required',
                'date'               => 'required',
                'type'               => 'required',
                'description'        => 'required',
                'image'              => 'required|mimes:png,jpg,jpeg,webp',
            ]
        );

        try {
          $newsEvent = NewsEvent::findOrFail($id); 
            $newsEvent->title = $request->title;
            $newsEvent->date = $request->date;
            $newsEvent->type = $request->type;
            $newsEvent->description = $request->description;

            $newsEvent->add_by = Auth::user()->id;
            $newsEvent->ip_address = $request->ip();
            if ($request->hasFile('image')) {
                $newsEvent->image = $this->imageUpload($request, 'image', 'uploads/newsEvent');
            }

            $newsEvent->update();
            return redirect()->route('newsEvent.index')->with('success', 'News & events Update Successful');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'News & events Update failed');
        }
    }

    public function delete($id)
    {

        try {
            $newsEvent = NewsEvent::find($id);
            if (file_exists($newsEvent->image) && $newsEvent->image != null) {
                unlink($newsEvent->image);
            }
            $newsEvent->delete();
            return redirect()->route('newsEvent.index')->with('success', ' News & events  Deleted Successful');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'News & events Deleted failed');
        }
    }
}
