@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')

<section class="benefits p90 asProjectSlider" id="ScrollHere"
    style="padding: 60px 0; position: relative; z-index: 1;">
    <!-- Background Image with Opacity Overlay -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://concordrealestatebd.com/wp-content/themes/concord/assets/image/apartbg.jpg');
        background-size: cover;
        background-position: center;
        opacity: 0.7;
        z-index: -1;
    "></div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="Title anim fadeRightWord text-center" style="color: #000;">
                    Our Projects <span style="font-size: 36px;"></span>
                </h2>
            </div>
        </div>

        <div class="row benefits__content anim fadeUp">
            <!-- Loop through all projects dynamically -->
            @foreach($allProjects as $project)
            <a href="{{ route('project.details', $project->slug) }}" class="col-md-4 col-sm-6 col-xs-12">
                <div class="benefits__content__single">
                    <img class="modify-img"
                        src="{{ asset($project->main_image) }}" alt="{{ $project->title ?? 'Project Image' }}">
                    <div class="benefits__content__single__hover">
                        <div class="benefits__content__single__hover__content">
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->location ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection