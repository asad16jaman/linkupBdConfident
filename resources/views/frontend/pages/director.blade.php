@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')


<style>
  h1 {
    text-align: center;
    font-weight: 700;
    font-size: 3rem;
    margin-bottom: 60px;
    color: #111;
    letter-spacing: 1.1px;
  }

  .directors-grid {
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 45px;
  }

  .note-card {
    display: flex;
    align-items: center;
    gap: 28px;
    border-bottom: 1.2px solid #e0e0e0;
    padding-bottom: 22px;
    position: relative;
    padding-left: 18px;
  }

  /* Left image (default) */
  .note-card .note-image {
    order: 0;
  }

  .note-card .note-content {
    order: 1;
  }

  /* Right image */
  .note-card.right-image {
    flex-direction: row-reverse;
    padding-left: 0;
    padding-right: 18px;
  }

  .note-card.right-image::before {
    left: auto;
    right: 0;
    background: linear-gradient(180deg, #2c3e50, #16a085);
  }

  .note-card.right-image .note-image {
    order: 0;
  }

  .note-card.right-image .note-content {
    order: 1;
    text-align: right;
  }

  .note-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10%;
    bottom: 10%;
    width: 6px;
    border-radius: 3px;
    background: linear-gradient(180deg, #16a085, #2c3e50);
  }

  .note-image {
    width: 220px;
    height: 280px;
    object-fit: cover;
    border-radius: 14px;
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.12);
    flex-shrink: 0;
    transition: transform 0.3s ease;
  }

  .note-image:hover {
    transform: scale(1.05);
  }

  .note-content {
    flex: 1;
  }

  .note-name {
    font-weight: 600;
    font-size: 1.3rem;
    margin: 0 0 6px 0;
    color: #2c3e50;
    letter-spacing: 0.04em;
  }

  .note-position {
    font-style: italic;
    font-weight: 500;
    font-size: 1.05rem;
    margin: 0 0 15px 0;
    color: #16a085;
  }

  .note-desc {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #555;
    text-align: justify;
  }

  @media (max-width: 800px) {

    .note-card,
    .note-card.right-image {
      flex-direction: column;
      align-items: center;
      padding-bottom: 18px;
      gap: 20px;
      border-bottom: 1px solid #ddd;
      padding-left: 0;
      padding-right: 0;
      text-align: center !important;
    }

    .note-card::before,
    .note-card.right-image::before {
      display: none;
    }

    .note-image {
      width: 180px;
      height: 230px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      margin: 0;
    }

    .note-content {
      text-align: center !important;
      margin-top: 0;
    }

    .note-name {
      font-size: 1.15rem;
    }

    .note-position {
      font-size: 1rem;
      margin-bottom: 12px;
    }

    .note-desc {
      font-size: 0.9rem;
      line-height: 1.5;
    }
  }
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
    $bannerImage = $chooseUs && $chooseUs->director_head_image
        ? asset($chooseUs->director_head_image)
        : asset('no.png');
@endphp

<section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
    <h1 style="color: white;">Board of Directors</h1>
</section>
<br>
<br>
<section class="directors-grid" aria-label="List of Board of Directors">
  @foreach ($directors as $index => $director)
  <article class="note-card {{ $index % 2 == 1 ? 'right-image' : '' }}">
    <img src="{{ asset($director->image) }}" alt="{{ $director->name }}" class="note-image" />
    <div class="note-content">
      <h2 class="note-name">{{ $director->name }}</h2>
      <p class="note-position">{{ $director->designation }}</p>
      <p>{!! $director->message !!}</p>
    </div>
  </article>
  @endforeach
</section>
@endsection