<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurStrength;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OurStrengthController extends Controller
{
   public function index()
    {
        $strength = OurStrength::latest()->get();
        return view('Admin.strength.index', compact('strength'));
    }

    public function store(Request $request)
    {
        $this->validate(\request(),
            [
                'title'       => 'required',
                'description' => 'required',
            ]);
        try {
            $strength = new OurStrength();
            $strength->title = $request->title;
            $strength->description = $request->description;

            $strength->add_by = Auth::user()->id;
            $strength->ip_address = $request->ip();
            $strength->save();
            return redirect()->route('strength.index')->with('success', 'Our Strength Created Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Our Strength created  failed');
        }

    }

    public function edit($id)
    {
        $strength = OurStrength::find($id);
        $strengths = OurStrength::get();
        return view('Admin.strength.edit', compact('strength', 'strengths'));
    }

    public function update($id, Request $request)
    {

        $this->validate(\request(),
        [
            'title'       => 'required',
            'description' => 'required',
        ]);

        try {
            $strength = OurStrength::find($id);
            $strength->title = $request->title;
            $strength->description = $request->description;

            $strength->add_by = Auth::user()->id;
            $strength->ip_address = $request->ip();

            $strength->update();
            return redirect()->route('strength.index')->with('success', 'Our Strength Update Successful');

        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Our Strength Update failed');
        }

    }

    public function delete($id)
    {

        try {
            $strength = OurStrength::find($id);
            $strength->delete();
            return redirect()->route('strength.index')->with('success', ' Our Strength Update Successful Deleted Successful');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Our Strength Update Successful Deleted failed');
        }

    }
}
