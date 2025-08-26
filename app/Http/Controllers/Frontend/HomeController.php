<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Director;
use App\Models\Gallery;
use App\Models\ManagmentTeam;
use App\Models\messageFromCeo;
use App\Models\Mission;
use App\Models\NewsEvent;
use App\Models\OurStrength;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Story;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingProjects = Project::where('status', 'upcoming')->latest()->get();
        $ongoingProjects  = Project::where('status', 'ongoing')->latest()->get();
        $completeProjects = Project::where('status', 'complete')->latest()->get();
        $newsEvents = NewsEvent::take(3)->latest()->get();
        $allProjects = Project::latest()->take(3)->get();
        $slider = Slider::latest()->get();
        $chooseUs = WhyChooseUs::first();
        $message = messageFromCeo::first();
        $whyChooseUsItems = WhyChooseUs::all();
        $ourStrengths = OurStrength::latest()->get();
        $stories = Story::latest()->get();
        $lastOne = Blog::latest()->first();
        $lastTow = Blog::latest()->skip(1)->take(2)->get();
        return view('frontend.pages.home', compact(
            'upcomingProjects',
            'ongoingProjects',
            'completeProjects',
            'allProjects',
            'slider',
            'ourStrengths',
            'stories',
            'whyChooseUsItems',
            'chooseUs',
            'message',
            'newsEvents',
            'lastOne',
            'lastTow'
        ));
    }

   

    public function projectsByStatus(Request $request)
    {
        $query = Project::query();
        if ($request->filled('status') && in_array($request->status, ['ongoing', 'complete', 'upcoming'])) {
            $query->where('status', $request->status);
            $currentStatus = $request->status;
        } else {
            $currentStatus = null;
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $projects = $query->latest()->get();
        $chooseUs = WhyChooseUs::first();
        $types = Project::select('type')->distinct()->pluck('type');
        $locations = Project::select('location')->distinct()->pluck('location');

        return view('frontend.pages.status', compact('projects', 'chooseUs', 'types', 'locations', 'currentStatus'));
    }
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $galleryImages = Gallery::where('project_id', $project->id)->pluck('project_image');

        return view('frontend.pages.details', compact('project', 'galleryImages'));
    }
    public function storyDetails($id)
    {
        $story = Story::findOrFail($id);
        return view('frontend.pages.story_details', compact('story'));
    }
    public function About()
    {
        $whyChooseUsItems = WhyChooseUs::all();
        return view('frontend.pages.about_us', compact('whyChooseUsItems'));
    }
    public function Director()
    {
        $directors = Director::all();
        $chooseUs = WhyChooseUs::first();

        return view('frontend.pages.director', compact('directors', 'chooseUs'));
    }



    public function Management()
    {
        $managements = ManagmentTeam::all();
        $chooseUs = WhyChooseUs::first();
        return view('frontend.pages.management', compact('managements', 'chooseUs'));
    }



    public function Mission()
    {
        $mission = Mission::first();
        $chooseUs = WhyChooseUs::first();
        return view('frontend.pages.mission_vission', compact('mission', 'chooseUs'));
    }
    public function allproject()
    {
        $allProjects = Project::latest()->get();
        return view('frontend.pages.allProject', compact('allProjects'));
    }
    public function Contact()
    {
        $chooseUs = WhyChooseUs::first();
        return view('frontend.pages.contact', compact('chooseUs'));
    }
    public function Event()
    {
        $news = NewsEvent::where('type', 'news')->latest()->get();
        $events = NewsEvent::where('type', 'event')->latest()->get();
        $chooseUs = WhyChooseUs::first();
        return view('frontend.pages.blog', compact('news', 'events', 'chooseUs'));
    }
    public function blogEventDetails($id)
    {
        $item = NewsEvent::findOrFail($id);
        return view('frontend.pages.blog_event_details', compact('item'));
    }
    public function VlogSection()
    {
        $chooseUs = WhyChooseUs::first();
        $vlogs = Blog::get();
        return view('frontend.pages.blogSingle', compact('vlogs','chooseUs'));
    }
    public function blogsingleDetails($id)
    {
        
        $item = Blog::findOrFail($id);
        return view('frontend.pages.single_vlog_details', compact('item'));
    }
}
