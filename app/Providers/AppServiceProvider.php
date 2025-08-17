<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Project; // ✅ Add this
use Illuminate\Support\Facades\View; // ✅ Add this
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $data = [];
        $data['info'] = Company::first();
        view()->share($data);
        $upcomingProjects  = Project::where('status', 'upcoming')->latest()->get();
        $ongoingProjects   = Project::where('status', 'ongoing')->latest()->get();
        $completeProjects = Project::where('status', 'complete')->latest()->get();

        View::share('upcomingProjects', $upcomingProjects);
        View::share('ongoingProjects', $ongoingProjects);
        View::share('completeProjects', $completeProjects);
    }
}
