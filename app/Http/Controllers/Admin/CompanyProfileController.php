<?php

namespace App\Http\Controllers\Admin;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\messageFromCeo;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\Auth;
class CompanyProfileController extends Controller
{
    public function index()
    {
        $info = Company::first();
        return view('Admin.company_profile', compact('info'));
    }

    public function update(Request $request)
    {
        $this->validate(
            \request(),
            [
                'company_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'footer_slogan' => 'required',
                'logo' => 'nullable|mimes:png,jpg,jpeg,svg',
            ]
        );
        try {

            $info = Company::first();
            $info->company_name = $request->company_name;
            $info->phone = $request->phone;
            $info->email = $request->email;
            $info->address = $request->address;
            $info->footer_slogan = $request->footer_slogan;
            $info->linkdin = $request->linkdin;
            $info->facebook = $request->facebook;
            $info->youtube = $request->youtube;
            $info->instagram = $request->instagram;
            $info->twitter = $request->twitter;
            $info->updated_by     = Auth::user()->id;
            $info->ip_address = $request->ip();
            if ($request->hasFile('logo')) {
                $info->logo = $this->imageUpload($request, 'logo', 'uploads/company');
            }
            $info->update();
            session()->flash('success', 'Company Profile Update successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', ' Company Profile Update failed');
        }
    }


    //  why choose us function 

    public function chooseUs()
    {
        $chooseUs = WhyChooseUs::first();
        return view('Admin.choose_us', compact('chooseUs'));
    }

  public function chooseUsUpdate(Request $request)
{
    $this->validate(
        $request,
        [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'head_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'management_head_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'director_head_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'mission_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'news_events_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'contact_head_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'status_head_image' => 'nullable|mimes:png,jpg,jpeg,svg',
        ]
    );

    try {
        $chooseUs = WhyChooseUs::first();
        $chooseUs->title = $request->title;
        $chooseUs->description = $request->description;
        $chooseUs->updated_by = Auth::user()->id;
        $chooseUs->ip_address = $request->ip();

        // Handle image uploads
        if ($request->hasFile('image')) {
            $chooseUs->image = $this->imageUpload($request, 'image', 'uploads/chooseUs');
        }

        if ($request->hasFile('head_image')) {
            $chooseUs->head_image = $this->imageUpload($request, 'head_image', 'uploads/chooseUs');
        }
        if ($request->hasFile('management_head_image')) {
            $chooseUs->management_head_image = $this->imageUpload($request, 'management_head_image', 'uploads/management');
        }
        if ($request->hasFile('director_head_image')) {
            $chooseUs->director_head_image = $this->imageUpload($request, 'director_head_image', 'uploads/director');
        }
        if ($request->hasFile('mission_image')) {
            $chooseUs->mission_image = $this->imageUpload($request, 'mission_image', 'uploads/mission');
        }
        if ($request->hasFile('news_events_image')) {
            $chooseUs->news_events_image = $this->imageUpload($request, 'news_events_image', 'uploads/events');
        }

        if ($request->hasFile('contact_head_image')) {
            $chooseUs->contact_head_image = $this->imageUpload($request, 'contact_head_image', 'uploads/contact');
        }
        
        if ($request->hasFile('status_head_image')) {
            $chooseUs->status_head_image = $this->imageUpload($request, 'status_head_image', 'uploads/status');
        }

        $chooseUs->update();
        session()->flash('success', 'Why Choose Us updated successfully!');
        return redirect()->back();

    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Why Choose Us update failed');
    }
}





    public function CeoDirector()

    {
        $message = messageFromCeo::first();
        return view('Admin.ceo', compact('message'));
    }

public function CeoDirectorUpdate(Request $request)
{
    $this->validate(
        $request,
        [
            'title' => 'required',
            'description' => 'required',
            'head_image_ceo' => 'nullable|mimes:png,jpg,jpeg,svg',
        ]
    );
    try {
        $message = messageFromCeo::first(); 
        $message->title = $request->title;
        $message->description = $request->description;
        $message->updated_by = Auth::id();
        $message->ip_address = $request->ip();

        if ($request->hasFile('head_image_ceo')) {
            $message->head_image_ceo = $this->imageUpload($request, 'head_image_ceo', 'uploads/message');
        }
        $message->save();

        session()->flash('success', 'Message from CEO updated successfully!');
        return redirect()->back();

    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Update failed. Try again.');
    }
}








}
