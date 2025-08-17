@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
<style>
  h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    padding: 1.5rem 2rem;
    margin-bottom: 2rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    outline-offset: 4px;
  }

  .card:focus,
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    outline: none;
  }

  .card p {
    font-size: 15px;
    line-height: 1.6;
    margin-top: 0.5rem;
  }

  .objectives-list {
    list-style: none;
    padding-left: 0;
    margin-top: 0.5rem;
  }

  .objectives-list li {
    padding-left: 1.25rem;
    margin-bottom: 0.75rem;
    position: relative;
    font-size: 1rem;
    line-height: 1.5;
  }

  .objectives-list li strong {
    color: #34495e;
  }

  .objectives-list li::before {
    content: "✔";
    position: absolute;
    left: 0;
    top: 0;
    color: #27ae60;
    font-weight: bold;
    font-size: 1rem;
    line-height: 1;
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
$bannerImage = $chooseUs && $chooseUs->mission_image
? asset($chooseUs->mission_image)
: asset('no.png');
@endphp
<section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
  <h1 style="color: white;">Our Mission, Vission And Values</h1>
</section>

<br>
<div class="container animate-on-scroll" role="main">
  <section class="card" aria-labelledby="mission-title" tabindex="0">
    <h2 id="mission-title">Our Mission</h2>
    <p>
      {!! $mission->mission !!}
    </p>
  </section>
  <section class="card" aria-labelledby="vision-title" tabindex="0">
    <h2 id="vision-title">Our Vision</h2>
    <p>
      {!! $mission->vision !!}
    </p>
  </section>
  <section class="card" aria-labelledby="objectives-title" tabindex="0">
    <h2 id="objectives-title">Our Values</h2>
    <ul class="objectives-list">
      {!! $mission->values !!}
    </ul>
  </section>
</div>

@endsection