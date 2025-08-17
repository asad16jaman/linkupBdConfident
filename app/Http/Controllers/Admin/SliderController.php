<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
     public function index()
    {
        $slider = Slider::latest()->get();
        return view('Admin.slider.index', compact('slider'));
    }

    public function store(Request $request)
    {
        $this->validate(\request(),
            [
                'image'       => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        try {
            $slider = new Slider();
            $slider->add_by = Auth::user()->id;
            $slider->ip_address = $request->ip();
            if ($request->hasFile('image')) {
             $slider->image = $this->imageUpload($request, 'image', 'uploads/slider');
            }
            $slider->save();
            return redirect()->route('slider.index')->with('success', 'Slider Created Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Slider created  failed');
        }

    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $sliders = Slider::get();
        return view('Admin.slider.edit', compact('slider', 'sliders'));
    }

    public function update($id, Request $request)
    {

        $this->validate(\request(),
        [
            'image'       => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        try {
            $slider = Slider::find($id);
            $slider->add_by = Auth::user()->id;
            $slider->ip_address = $request->ip();
            // Handle image uploads individually
            if ($request->hasFile('image')) {
             $slider->image = $this->imageUpload($request, 'image', 'uploads/slider');
            }

            $slider->update();
            return redirect()->route('slider.index')->with('success', 'Slider Update Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Slider Update failed');
        }

    }

    public function delete($id)
    {

        try {
            $slider = Slider::find($id);
            if (file_exists($slider->image) && $slider->image != null) {
                unlink($slider->image);
            }
            $slider->delete();
            return redirect()->route('slider.index')->with('success', ' Slider Deleted Successful');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Slider Deleted failed');
        }

    }
}
