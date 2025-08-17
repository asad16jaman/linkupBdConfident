@extends('frontend.layouts.web_master')
@section('title', $item->title)
@section('content')

<br><br>
<br><br>

<style>
  .details-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 30px 15px;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: flex-start;
  }

  .details-image {
    flex: 1 1 350px;
    max-width: 450px;
  }

  .details-image img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  .details-content {
    flex: 2 1 500px;
  }

  .details-content h1 {
    font-size: 2.2rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #2d3436;
  }

  .details-meta {
    font-size: 1rem;
    color: #666;
    margin-bottom: 20px;
  }

  .details-description {
    font-size: 1.15rem;
    color: #333;
    line-height: 1.8;
    margin-bottom: 30px;
  }

  .details-footer {
    font-size: 0.9rem;
    color: #888;
    border-top: 1px solid #ddd;
    padding-top: 15px;
  }

  @media (max-width: 768px) {
    .details-container {
      flex-direction: column;
    }
    .details-image, .details-content {
      max-width: 100%;
    }
  }
</style>

<div class="details-container">
  <!-- Left: Image -->
  <div class="details-image">
    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
  </div>

  <!-- Right: Text Content -->
  <div class="details-content">
    <h1>{{ $item->title }}</h1>
    <div class="details-description">
      {!! $item->description !!}
    </div>
  </div>
</div>

@endsection
