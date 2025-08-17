@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')

<style>
    .team-section {
        margin: 0 auto;
        padding: 40px 20px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    }

    .team-section h2 {
        font-size: 2.8rem; /* বড় করলাম */
        font-weight: 600;
        margin-bottom: 30px;
        color: #2a6f4f;
        text-align: center;
        letter-spacing: 1px;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 26px;
    }
    .team-card {
        background: #fff;
        height: 330px;
        border-radius: 16px;
        padding: 26px 22px 32px;
        text-align: center;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
        border: 4px solid #9e9e9e;
        margin-bottom: 0; /* নিচে কোনো গ্যাপ রাখলাম না */
    }

    .team-card:hover {
        border-color: #d32f2f;
        box-shadow: 0 12px 28px rgba(211, 47, 47, 0.25);
    }

    .team-card img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: contain;
        margin-bottom: 18px;
        border: 5px solid #9e9e9e;
        background: #f0f6f3;
        transition: border-color 0.3s ease;
    }

    .team-card:hover img {
        border-color: #d32f2f;
    }

    .team-card h3 {
        font-size: 1.8rem; /* বড় করলাম */
        margin-bottom: 6px;
        color: #555;
        transition: color 0.3s ease;
    }

    .team-card:hover h3 {
        color: #d32f2f;
    }

    .team-card p.role {
        font-size: 1.2rem; /* বড় করলাম */
        color: #777;
        font-weight: 600;
        margin-bottom: 14px;
        letter-spacing: 0.7px;
        transition: color 0.3s ease;
    }

    .team-card:hover p.role {
        color: #b71c1c;
    }

    .team-card p.bio {
        font-size: 1.1rem; /* বড় করলাম */
        color: #444;
        line-height: 1.4;
        min-height: 60px;
        transition: color 0.3s ease;
    }

    .team-card:hover p.bio {
        color: #d32f2f;
    }

    @media (max-width: 600px) {
        .team-section h2 {
            font-size: 2rem; /* মোবাইলের জন্য বড় */
        }
        .team-card h3 {
            font-size: 1.4rem;
        }
        .team-card p.role {
            font-size: 1rem;
        }
        .team-card p.bio {
            font-size: 1rem;
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
    $bannerImage = $chooseUs && $chooseUs->management_head_image
        ? asset($chooseUs->management_head_image)
        : asset('no.png');
@endphp

<section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
    <h1 style="color: white;">Management Team</h1>
</section>

<section class="team-section">
    <div class="team-grid">
        @foreach ($managements as $member)
        <div class="team-card">
            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" />
            <h3>{{ $member->name }}</h3>
            <p class="role">{{ $member->designation }}</p>
            <p class="bio">{{ $member->department }}</p>
        </div>
        @endforeach
    </div>
</section>

@endsection
