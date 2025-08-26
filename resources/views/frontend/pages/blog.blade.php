@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
<style>
  .blog-event-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 0 1.5rem;
    font-family: 'Segoe UI', sans-serif;
  }
  .section-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 10px;
    color: black !important;
    border-bottom: 2px solid rgba(255, 255, 255, 0.4);
    padding-bottom: 10px;
  }

  .grid-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-bottom: 10px;
  }

  .card {
    /* border-radius: 10px; */
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    color: white;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 3px solid rgba(255, 255, 255, 0.3);
  }

  .card-body {
    padding: 15px 20px;
  }

  .card-type {
    font-size: 1rem;
    text-transform: uppercase;
    margin-bottom: 8px;
    color: white;
  }

  .card-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: white;
  }

  .card-date {
    font-size: 1rem;
    margin-bottom: 12px;
    color: white;
  }

  .card-desc {
    font-size: 1.05rem;
    line-height: 1.6;
    color: white;
  }

  .bg-color-1 { background: #2d3436; }
  .bg-color-2 { background: #00cec9; }
  .bg-color-3 { background: #6c5ce7; }
  .bg-color-4 { background: #e17055; }


    .banner {
    position: relative;
    height: 450px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    overflow: hidden;
    padding-left: 20px;
    padding-right: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    letter-spacing: 6px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

.banner::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4); 
  backdrop-filter: blur(2px); 
  z-index: 1;
  transition: background 0.3s ease;
}
  .banner h1 {
    position: relative;
    font-size: 4.5rem;
    z-index: 2;
    text-transform: uppercase;
    font-weight: 700;
    margin: 0;
    line-height: 1.1;
    max-width: 900px;
    user-select: none;
  }
  .background-section {
    display: flex;
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 10px;
    gap: 20px;
    flex-wrap: wrap;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .background-text {
    flex: 1 1 500px;
  }

  .background-text h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: #4a148c;
    font-weight: 700;
    position: relative;
  }
</style>

@php
$bannerImage = $chooseUs && $chooseUs->mission_image
? asset($chooseUs->mission_image)
: asset('no.png');
@endphp

<section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
  <h1 style="color: white;">News And Events</h1>
</section>


<div class="blog-event-container">
  {{-- News Section --}}
  <div>
    <h2 class="section-title">Latest News</h2>
    <div class="grid-wrapper">
      @foreach ($news as $index => $item)
        @php
          $plainDesc = strip_tags($item->description);
          $words = explode(' ', $plainDesc);
          $limitedDesc = implode(' ', array_slice($words, 0, 15)) . (count($words) > 15 ? '...' : '');
        @endphp
        <a href="{{ route('blog.events.details', $item->id) }}" style="text-decoration: none;">
          <div class="card bg-color-{{ ($index % 4) + 1 }}">
            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
            <div class="card-body">
              <div class="card-type" style="font-size:15px">{{ ucfirst($item->type) }}</div>
              <div class="card-date">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</div>
              <h3 class="card-title" style="font-size:17px">{{ $item->title }}</h3>
              <p class="card-desc" style="font-size:15px">{{ $limitedDesc }}</p>
              <div style="display:flex;justify-content:end">
                <button style="border: none;background: gray;font-size:15px">Read More</button>
              </div>
            </div>
          </div>
          
        </a>
      @endforeach
    </div>
  </div>

  {{-- Events Section --}}
  <div>
    <h2 class="section-title">Upcoming Events</h2>
    <div class="grid-wrapper">
      @foreach ($events as $index => $item)
        @php
          $plainDesc = strip_tags($item->description);
          $words = explode(' ', $plainDesc);
          $limitedDesc = implode(' ', array_slice($words, 0, 100)) . (count($words) > 100 ? '...' : '');
        @endphp
        <a href="{{ route('blog.events.details', $item->id) }}" style="text-decoration: none;">
          <div class="card bg-color-{{ ($index % 4) + 1 }}">
            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
            <div class="card-body">
              <div class="card-type">{{ ucfirst($item->type) }}</div>
              <div class="card-date">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</div>
              <h3 class="card-title">{{ $item->title }}</h3>
              <p class="card-desc">{{ $limitedDesc }}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>
@endsection
