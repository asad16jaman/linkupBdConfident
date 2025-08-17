@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
  <style>
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

    .background-text h2::after {
      content: "";
      width: 60px;
      height: 4px;
      background: #6a1b9a;
      position: absolute;
      left: 0;
      bottom: -10px;
      border-radius: 2px;
    }
    .background-image {
      flex: 1 1 400px;
      border-radius: 12px; 
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .background-image img {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
    }
    .background-image:hover {
      transform: scale(1.05);
      box-shadow: 0 20px 40px rgba(106, 27, 154, 0.5);
    }
    @media (max-width: 900px) {
      .background-section {
        flex-direction: column-reverse;
        gap: 15px; 
      }
      .background-text,
      .background-image {
        flex: 1 1 100%;
        margin: 0 auto;
      }
      .background-image {
        margin-bottom: 20px;
      }
    }
    @media (max-width: 480px) {
      .banner h1 {
        font-size: 2.5rem;
        padding: 0 10px;
        letter-spacing: 3px;
      }
      .background-text h2 {
        font-size: 1.8rem;
      }
    }
  </style>
  @php
    $bannerImage = isset($whyChooseUsItems[0]) && $whyChooseUsItems[0]->head_image ? asset($whyChooseUsItems[0]->head_image) : 'https://r4.wallpaperflare.com/wallpaper/246/99/675/texture-digital-art-pattern-artwork-wallpaper-1916c2e61b8a2f9af0fba27a88f7d523.jpg';
  @endphp
  <section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
    <h1 style="color: white;">About Us</h1>
  </section>
  <section class="background-section" aria-labelledby="background-title" style="margin-top: 20px;">
    @foreach ($whyChooseUsItems as $item)
      <div class="background-text">
        <h2 id="background-title">{{ $item->title }}</h2>
        {{-- Assuming description might be multiline or multiple paragraphs --}}
        @foreach (explode("\n", $item->description) as $paragraph)
          <p>{{ $paragraph }}</p>
        @endforeach
      </div>
      <div class="background-image" aria-hidden="true">
        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" />
      </div>
    @endforeach
  </section>
@endsection
