@extends('frontend.layouts.web_master')
@section('title', $story->title)
@section('content')

<style>
  .story-details-wrapper {
    padding-top: 80px;
    padding-bottom: 80px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .story-details-card {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    background: linear-gradient(135deg, #f8f9fb, #ffffff);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease;
    gap: 30px;
    padding: 40px;
  }

  .story-details-card:hover {
    transform: translateY(-5px);
  }

  .story-details-img {
    width: 100%;
    height: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 16px;
  }

  .story-card-content {
    display: flex;
    flex-direction: column;
  }

  .story-card-content h2 {
    font-size: 2.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 25px;
    border-bottom: 4px solid #e9814c;
    display: inline-block;
    padding-bottom: 8px;
  }

  .story-card-content p {
    font-size: 1.1rem;
    line-height: 1.9;
    color: #555;
  }

  @media (max-width: 992px) {
    .story-details-card {
      grid-template-columns: 1fr;
    }

    .story-details-img {
      max-height: 300px;
    }
  }
</style>

<div class="container story-details-wrapper">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="story-details-card">
        <img src="{{ asset($story->image) }}" alt="{{ $story->title }}" class="story-details-img">
        <div class="story-card-content">
          <h2>{{ $story->title }}</h2>
          <p>{!! $story->description !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
