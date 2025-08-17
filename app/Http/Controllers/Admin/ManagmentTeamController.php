<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ManagmentTeam;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagmentTeamController extends Controller
{
   public function index()
    {
        $managment = ManagmentTeam::latest()->get();
        return view('Admin.managment.index', compact('managment'));
    }

    public function store(Request $request)
    {
        $this->validate(\request(),
            [
                'name'       => 'required',
                'designation' => 'required',
                'department' => 'required',
                'image'       => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        try {
            $managment = new ManagmentTeam();
            $managment->name = $request->name;
            $managment->designation = $request->designation;
            $managment->department = $request->department;

            $managment->add_by = Auth::user()->id;
            $managment->ip_address = $request->ip();
            if ($request->hasFile('image')) {
             $managment->image = $this->imageUpload($request, 'image', 'uploads/managment');
            }
            $managment->save();
            return redirect()->route('managment.index')->with('success', 'Managment Team Created Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Managment Team created  failed');
        }

    }

    public function edit($id)
    {
        $managment = ManagmentTeam::find($id);
        $managments = ManagmentTeam::get();
        return view('Admin.managment.edit', compact('managment', 'managments'));
    }

    public function update($id, Request $request)
    {

        $this->validate(\request(),
        [
            'name'       => 'required',
            'designation' => 'required',
            'department' => 'required',
            'image'       => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        try {
            $managment = ManagmentTeam::find($id);
            $managment->name = $request->name;
            $managment->designation = $request->designation;
            $managment->department = $request->department;

            $managment->add_by = Auth::user()->id;
            $managment->ip_address = $request->ip();
            // Handle image uploads individually
            if ($request->hasFile('image')) {
             $managment->image = $this->imageUpload($request, 'image', 'uploads/managment');
            }

            $managment->update();
            return redirect()->route('managment.index')->with('success', 'Managment Team Update Successful');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Managment Team Update failed');
        }

    }

    public function delete($id)
    {

        try {
            $managment = ManagmentTeam::find($id);
            if (file_exists($managment->image) && $managment->image != null) {
                unlink($managment->image);
            }
            $managment->delete();
            return redirect()->route('managment.index')->with('success', ' Managment Team Deleted Successful');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Managment Team Deleted failed');
        }

    }
}
