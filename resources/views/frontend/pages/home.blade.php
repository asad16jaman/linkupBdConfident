@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
  @include('frontend.partials.slider')
  <style>
    .color_blue{
      color: #0a0a6a !important;
    }
    
    .col-md-5th {
      position: relative;
      width: 50%;
      min-height: 1px;
      padding-left: 15px;
      padding-right: 15px;
      float: left;
      box-sizing: border-box;
    }

    .row::after {
    content: "";
    display: table;
    clear: both;
    }

    @media (max-width: 992px) {
    .col-md-5th {
      width: 33.3333%;
    }
    }

    @media (max-width: 576px) {
    .col-md-5th {
      width: 100%;
      padding-left: 0;
      padding-right: 0;
    }
    }
  </style>
  <style>
    .success-story-card {
    max-width: 100%;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background: #fff;
    font-family: 'Segoe UI', sans-serif;
    transition: transform 0.3s ease;
    }

    .success-story-card:hover {
    transform: translateY(-5px);
    }

    .success-story-card img {
    width: 100%;
    height: auto;
    display: block;
    }

    .card-content {
    padding: 20px;
    }

    .card-content h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
    }

    .card-content p {
    font-size: 15px;
    color: #555;
    line-height: 1.5;
    }

    .apart-container {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: auto;
    padding: 60px 20px;
    color: white;
    }

    .apart-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 40px;
    }

    .apart-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    }

    .apart-card {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    width: 280px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: transform 0.3s ease;
    }

    .apart-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.2);
    }

    .apart-icon {
    font-size: 40px;
    margin-bottom: 10px;
    color: #fff;
    }

    .apart-card h4 {
    margin-bottom: 10px;
    font-size: 18px;
    }

    .apart-card p {
    font-size: 14px;
    color: #ddd;
    }

    .apart-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    }

    .apart-modal-content {
    background: #fff;
    padding: 30px;
    max-width: 500px;
    width: 90%;
    border-radius: 12px;
    position: relative;
    color: #000;
    animation: fadeIn 0.3s ease;
    }

    .apart-modal-content h4 {
    margin-bottom: 10px;
    }

    .apart-modal-content p {
    font-size: 15px;
    line-height: 1.6;
    }

    .apart-close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: #333;
    }

    @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.9);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
    }

    @media (max-width: 768px) {
    .apart-card {
      width: 100%;
    }
    }

    .apart-container {
    position: relative;
    color: white;
    overflow: hidden;
    z-index: 1;
    }
  </style>
  <!-- background: url('https://r4.wallpaperflare.com/wallpaper/848/913/162/minimalism-abstract-digital-art-lines-wallpaper-c9f018fdd1fa3dab0687280f60a1361d.jpg') center/cover no-repeat; -->
  <section class="benefits  asProjectSlider" id="ScrollHere" style="padding: 15px; ">
    <div class="container">
    <div class="row py-3" style="padding: 30px 0px;">
      <div class="col-md-12">
      <h2 class="Title anim fadeRightWord text-center" style="font-weight: 600 !important;">
        Explore Our Projects
      </h2>
      </div>
      <!-- <div class="clearfix"></div> -->
      <!-- fadeUp -->
      <div class="benefits__content anim " style="padding-top:30px">
      <div class="BenifitsSliderInit">
        @foreach($allProjects as $project)
      <div class="col-md-4">
      <div class="benefits__content__single" style="border-radius: 10px; overflow: hidden;">
        <img class="modify-img" data-image-small="{{ asset($project->main_image) }}" data-src=""
        src="{{ asset($project->main_image) }}" alt=""
        style="width: 100%; height: 100%; border-radius: 10px;object-fit:cover">
        <a href="{{ route('project.details', $project->slug) }}"></a>
        <div class="benefits__content__single__hover">
        <div class="benefits__content__single__hover__content">
        <h4 style="text-transform: capitalize !important;">{{ $project->title }}</h4>
        <p>{{ $project->location ?? '' }}</p>
        </div>
        </div>
      </div>
      </div>
      @endforeach
      </div>
      <div class="slider__nav">
        <ul>
        <li class="Goleft">
          <img src="https://concordrealestatebd.com/wp-content/themes/concord/assets/image/goLeft.svg" alt="">
        </li>
        <li class="Goright">
          <img src="https://concordrealestatebd.com/wp-content/themes/concord/assets/image/goRight.svg" alt="">
        </li>
        </ul>
      </div>
      </div>
    </div>
    </div>
  </section>
  <style>
    .why-choose-section {
    position: relative;
    width: 100%;
    overflow: hidden;
    /* background-color: rgba(0, 0, 0, 0.6); */
    color: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 0;
    }

    .why-choose-section__bg {
    position: absolute;
    /* inset: 0; */
    /* background: url('https://img.freepik.com/premium-photo/blurry-image-bridge-with-lights-it_804788-162814.jpg') center/cover no-repeat; */
    /* filter: brightness(0.75); */
    /* opacity: 0.5; */
    background: white;
    pointer-events: none;
    z-index: 0;
    }

    .why-choose-section__container {
    position: relative;
    z-index: 1;
    padding: 40px 20px;
    }

    /* MANAGING DIRECTOR */
    .md-message-section {
    background-color: #e7e6e6;
    padding: 10px;
    border-left: 4px solid #E9814C;
    border-right: 4px solid #E9814C;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 40px;
    border-radius: 10px;
    color: #222;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    }

    .md-message-image {
    flex: 0 0 200px;
    text-align: center;
    }

    .md-message-image img {
    width: 200px;
    border-radius: 12px;
    border: 2px solid #E9814C;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .md-message-content {
    flex: 1;
    min-width: 250px;
    }

    .md-message-content h2 {
    font-size: 28px;
    color: #E9814C;
    margin-bottom: 10px;
    }

    .md-message-content .name-title {
    font-weight: bold;
    font-size: 18px;
    margin: 10px 0 20px 0;
    color: #333;
    }

    .md-message-content .message-text {
    font-style: italic;
    color: #555;
    line-height: 1.6;
    text-align: justify;
    }

    /* WHY CHOOSE US */
    .why-choose-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    background-color: #f9f9f9;
    padding: 40px;
    border-radius: 10px;
    align-items: center;
    margin-bottom: 40px;
    }

    .why-choose-section__left {
    flex: 1;
    min-width: 300px;
    max-width: 700px;
    color: #000;
    }

    .why-choose-section__left h2 {
    font-size: 28px;
    margin-bottom: 25px;
    text-transform: uppercase;
    text-align: left;
    }

    .why-choose-section__left p {
    margin-bottom: 12px;
    line-height: 1.6;
    text-align: justify;
    }

    .why-choose-section__button-wrapper {
    margin-top: 20px;
    }

    .why-choose-section__button-wrapper a {
    display: inline-block;
    padding: 12px 28px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    background: #FF6600;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }


    .why-choose-section__image {
    flex: 1;
    min-width: 280px;
    text-align: center;
    }

    .why-choose-section__image img {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* WHAT SETS US APART */
    .why-choose-section__right {
    margin-top: 40px;
    }

    .why-choose-section__right h2 {
    font-size: 24px;
    margin-bottom: 25px;
    text-transform: uppercase;
    text-align: center;
    color: black;
    }

    .why-choose-section__strengths {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    }

    .why-choose-section__strength {
    background: rgb(7 82 118 / 98%);
    padding: 20px;
    border-radius: 12px;
    /* width: calc(33.333% - 20px);
    min-width: 280px;
    max-width: 350px; */
    min-width: 280px;
    width:32%;
    backdrop-filter: blur(6px);
    transition: 0.3s;
    cursor: pointer;
    color: white;
    text-align: center;
    }

    .why-choose-section__strength i {
    font-size: 3.5rem;
    margin-bottom: 10px;
    color: #ffcc80;
    transition: color 0.3s;
    }

    .why-choose-section__strength:hover {
    /* background: red; */
    transform: translateY(-5px);
    }

    .why-choose-section__strength:hover i {
    color: white;
    }

    @media (max-width: 768px) {

    .md-message-section,
    .why-choose-wrapper {
      flex-direction: column;
    }

    .md-message-content,
    .why-choose-section__left {
      text-align: center;
    }

    .why-choose-section__left h2 {
      text-align: center;
    }
    }
  </style>

  <div class="why-choose-section">
    <div class="why-choose-section__bg"></div>
    <div class="container why-choose-section__container">

    <!-- MANAGING DIRECTOR SECTION -->
    <div class="md-message-section">
      <div class="md-message-image">
      <img src="{{ @$message->head_image_ceo ? asset(@$message->head_image_ceo) : asset('no.png') }}"
        alt="Managing Director" />
      </div>
      <div class="md-message-content">
      <h2>Managing Director’s Message</h2>
      <p class="name-title">{{$message->title}}</p>
      <p class="message-text" style="color: black;">
        {{$message->description}}
      </p>
      </div>
    </div>

    <!-- WHY CHOOSE US -->
    <div class="why-choose-wrapper" style="border-right: 4px solid #E9814C;border-left: 4px solid #E9814C;">
      <!-- Left Text -->
      <div class="why-choose-section__left">
      <h2 style="color: #E9814C;">WHY {{ $info->company_name }}?</h2>
      @foreach ($whyChooseUsItems as $item)
      @foreach (explode("\n", $item->description) as $paragraph)
      <p>{{ $paragraph }}</p>
      @endforeach
    @endforeach
      <div class="why-choose-section__button-wrapper">
        <a href="{{ route('about') }}">Explore More</a>
      </div>
      </div>
      <!-- Right Image -->
      <div class="why-choose-section__image">
      <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" />
      </div>
    </div>

    <!-- WHAT SETS US APART -->
    <div class="why-choose-section__right">
      <h2 style="font-size:30px;width:600">Why We're Different</h2>
      <div class="why-choose-section__strengths">
      @php
      $faIcons = [
      'fa-building',
      'fa-city',
      'fa-home',
      'fa-warehouse',
      'fa-building-columns',
      'fa-hotel',
      'fa-house-chimney',
      'fa-house'
      ];
    @endphp

      @foreach($ourStrengths as $index => $strength)
      @php
      $icon = $faIcons[$index % count($faIcons)];
      @endphp

      <div onclick="openModal({{ $index }})" class="why-choose-section__strength">
        <i class="fa-solid {{ $icon }}" style="color:#fff"></i>
        <h4 style="color: white;">{{ $strength->title }}</h4>
        <p style="color: white;">{{ Str::limit(strip_tags($strength->description), 60) }}</p>
      </div>
    @endforeach
      </div>
    </div>

    </div>
  </div>

  <div class="container">

    <div class="row">
    <div class="col-md-12">
      <h2 class="Title anim fadeRightWord text-center" style="font-weight: 600 !important;">
      Latest News & Articles
      </h2>
    </div>
    </div>
    <div class="row" style="padding: 34px 0px;">
    @foreach ($newsEvents as $event)
    <div class="col-md-4 col-12 col-lg-3">
      @php
      $plainDesc = strip_tags($event->description);
      $words = explode(' ', $plainDesc);
      $limitedDesc = implode(' ', array_slice($words, 0, 15)) . (count($words) > 15 ? '...' : '');
    @endphp
      <div class="card" style="width: 100%;background: #9f9e9e;box-shadow: -2px -2px 8px 4px gray;color: #fff;">
      <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->title }}">
      <div class="card-body" style="padding: 15px 21px;">
      <div class="card-type" style="font-size:17px">{{ ucfirst($event->type) }}</div>
      <div class="card-date" style="font-size: 14px;">{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}
      </div>
      <h3 class="card-title" style="font-size:17px;color:#fff">{{ $event->title }}</h3>
      <p class="card-desc" style="font-size:15px;color:#fff">{{ $limitedDesc }}</p>
      <a href="{{ route('blog.events.details', $event->id) }}" class="btn btn-primary">Read More</a>
      </div>
      </div>
    </div>
    @endforeach
    </div>
    <div class="row" style="margin-bottom:35px">
    <div class="d-flex text-center">
      <a href="{{ route('event.show') }}" class="btn see_all_btn">View All</a>
    </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <h2 class="Title anim fadeRightWord text-center" style="font-weight: 600 !important;">
      Latest Blog
      </h2>
    </div>
    </div>
    <div class="row" style="padding: 34px 0px;">
    <div class="col-md-6 p-0">
      <img src="{{ asset($lastOne->image) }}" class="" alt="{{ $lastOne->title }}" style="width:100%;height: 500px;object-fit: cover;">
    </div>
    <div class="col-md-6">
      <div>
        @php
          $plainaboutDesc = strip_tags($lastOne->description);
          $words = explode(' ', $plainaboutDesc);
          $limitedaboutDesc = implode(' ', array_slice($words, 0, 35)) . (count($words) > 35 ? '...' : '');
        @endphp
        <h2 class="color_blue" style="margin-top:0">
          <a href="{{ route('blog.single.details',['id'=>$lastOne->id]) }}">{{ $lastOne->title }}</a>
        </h2>
        <p>{{ $limitedaboutDesc }}</p>
        <p style="font-size: 13px;" class="color_blue">
          <a href="{{ route('blog.single.details',['id'=>$lastOne->id]) }}"><span>Read More</span>
          <span><i class="fa-solid fa-arrow-right"></i></span></a>
        </p>
      </div>
      <div class="row" style="display: flex;">
        @foreach ($lastTow as $blog)
          <div class="" style="width:50%;padding:5px">
            @php
                $firstTen = Str::of($blog->title)
                            ->explode(' ')
                            ->take(10)
                            ->implode(' ');
            @endphp
            <div>
              <img style="width: 100%;height: 173px;object-fit: cover;" src="{{ asset($blog->image) }}" alt="">
              <p  style="margin-top:10px">
                <a href="{{ route('blog.single.details',['id'=>$blog->id]) }}">{{ $firstTen }}</a>
              </p>
              <a class="color_blue" href="{{ route('blog.single.details',['id'=>$blog->id]) }}" style="font-size: 13px;"><span>Read More</span>
          <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    </div>
    <div class="row" style="margin-bottom:35px">
    <div class="d-flex text-center">
      <a href="{{ route('vlog') }}" class="btn btn-info see_all_btn">View All</a>
    </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="apart-modal" id="apartModal">
    <div class="apart-modal-content">
    <span class="apart-close" onclick="closeModal()">&times;</span>
    <h4 id="modalTitle"></h4>
    <p id="modalDescription"></p>
    </div>
  </div>


  <script>
    const strengths = @json($ourStrengths->map(fn($s) => [
    'title' => $s->title,
    'description' => strip_tags($s->description)
    ]));

    function openModal(index) {
    document.getElementById('modalTitle').innerText = strengths[index].title;
    document.getElementById('modalDescription').innerText = strengths[index].description;
    document.getElementById('apartModal').style.display = 'flex';
    }

    function closeModal() {
    document.getElementById('apartModal').style.display = 'none';
    }

    window.addEventListener('click', function (e) {
    const modal = document.getElementById('apartModal');
    if (e.target === modal) closeModal();
    });
  </script>

  <!-- include('frontend.partials.says') -->
@endsection