@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')


<br><br>
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
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-bottom: 10px;
  }

  .card {
    border-radius: 10px;
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
</style>
<div class="blog-event-container">
  {{-- News Section --}}
  <div>
    <h2 class="section-title">Latest News</h2>
    <div class="grid-wrapper">
      @foreach ($vlogs as $index => $item)
  <a href="{{ route('blog.single.details', $item->id) }}" style="text-decoration: none;">
    <div class="card bg-color-{{ ($index % 4) + 1 }}">
      <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
      <div class="card-body">
        <h3 class="card-title">{{ $item->title }}</h3>
        @php
          $words = Str::words(strip_tags($item->description), 70, '...');
        @endphp
      </div>
    </div>
  </a>
@endforeach
    </div>
  </div>

</div>



@endsection