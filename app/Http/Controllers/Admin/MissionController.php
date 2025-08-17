<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function index()
    {
        $mission = Mission::first();
        return view('Admin.mission', compact('mission'));
    }

    public function update(Request $request)
    {
        $this->validate(
            \request(),
            [
                'mission' => 'required',
                'vision' => 'required',
                'values' => 'required',
            ]
        );
        try {

            $mission = Mission::first();
            $mission->mission = $request->mission;
            $mission->vision = $request->vision;
            $mission->values = $request->values;
            $mission->updated_by     = Auth::user()->id;
            $mission->ip_address = $request->ip();

            $mission->update();
            session()->flash('success', 'Our Mission Vission and Values Update successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Our Mission Vission and Values Update failed');
        }
    }
}
