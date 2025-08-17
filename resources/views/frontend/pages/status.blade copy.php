@extends('frontend.layouts.web_master')
@section('content')

<style>
  /* Banner */
  .banner {
    position: relative;
    height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    letter-spacing: 6px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-bottom: 40px;
  }
  .banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(3px);
    z-index: 1;
  }
  .banner h1 {
    position: relative;
    font-size: 3.8rem;
    z-index: 2;
    text-transform: uppercase;
    font-weight: 700;
    margin: 0;
    line-height: 1.1;
    max-width: 900px;
    user-select: none;
  }

  /* Category Panel */
  .category-panel {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 40px;
  }
  .category-box {
    flex: 1 1 150px;
    max-width: 180px;
    background-color: #f5f7fa;
    border: 2px solid #d1d9e6;
    border-radius: 12px;
    padding: 18px 0;
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #222;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    text-decoration: none;
  }
  .category-box:hover {
    background-color: #e9814c;
    border-color: #e9814c;
    color: #fff;
  }
  .category-box svg {
    width: 30px;
    height: 30px;
    fill: currentColor;
  }
  .active-category {
    background-color: #2d5ba9 !important;
    border-color: #2d5ba9 !important;
    color: white !important;
    pointer-events: none;
  }

  /* Filter Form */
  .filter-form .form-control {
    border-radius: 8px;
    border: 1.5px solid #ccc;
    height: 42px;
    font-size: 1rem;
    padding-left: 12px;
    transition: border-color 0.3s ease;
  }
  .filter-form .form-control:focus {
    border-color: #e9814c;
    box-shadow: none;
  }
  .filter-form label {
    font-weight: 600;
    color: #444;
    margin-bottom: 6px;
    display: block;
  }
  .filter-form button.btn-primary {
    background-color: #e9814c;
    border-color: #e9814c;
    font-weight: 700;
    font-size: 1.1rem;
    height: 42px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
  }
  .filter-form button.btn-primary:hover {
    background-color: #cc723f;
    border-color: #cc723f;
  }

  /* Project Grid */
  .benefits__content__single {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    background-color: white;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }
  .benefits__content__single:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  }
  .benefits__content__single__img img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
    display: block;
  }
  .benefits__content__single__hover {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: white;
    padding: 12px 16px;
    opacity: 0;
    transition: opacity 0.25s ease;
  }
  .benefits__content__single:hover .benefits__content__single__hover {
    opacity: 1;
  }
  .benefits__content__single__hover__content h4 {
    margin: 0 0 6px;
    font-weight: 700;
    font-size: 1.1rem;
  }
  .benefits__content__single__hover__content p {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.9;
  }

  /* Responsive */
  @media (max-width: 991px) {
    .banner h1 {
      font-size: 3rem;
    }
    .benefits__content__single__img img {
      height: 140px;
    }
  }
  @media (max-width: 576px) {
    .category-box {
      max-width: 100%;
      flex: 1 1 100%;
    }
    .banner {
      height: 300px;
      letter-spacing: 3px;
    }
    .banner h1 {
      font-size: 2.2rem;
    }
  }
</style>

@php
  $currentStatus = $currentStatus ?? request('status') ?? null;

  $categories = [
    ['status' => 'ongoing', 'label' => 'Ongoing', 'icon' => '
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.5v-5h-2v5Zm-1-7a1 1 0 1 1 1-1 1.001 1.001 0 0 1-1 1Z"/></svg>
    '],
    ['status' => 'complete', 'label' => 'Complete', 'icon' => '
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19l12-12-1.4-1.4z"/></svg>
    '],
    ['status' => 'upcoming', 'label' => 'Upcoming', 'icon' => '
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4a8 8 0 1 0 8 8 8.01 8.01 0 0 0-8-8Zm1 11h-2v-6h2Z"/></svg>
    '],
  ];
@endphp

<div class="render_projectgrid">

  @php
    $bannerImage = $chooseUs && $chooseUs->status_head_image
      ? asset($chooseUs->status_head_image)
      : asset('no.png');
  @endphp

  {{-- Banner --}}
  <section class="banner" role="banner" aria-label="Project Banner" style="background-image: url('{{ $bannerImage }}');">
    <h1>
      {{ $currentStatus ? ucfirst($currentStatus) . ' Projects' : 'All Projects' }} ({{ $projects->count() }})
    </h1>
  </section>

  {{-- Status Buttons Panel --}}
  <div class="category-panel container">
    @foreach ($categories as $key => $card)
      @php
        $isActive = $currentStatus === $card['status'];
        $type = request('type');
        $location = request('location');
      @endphp
      <a href="{{ route('projects.filter', ['status' => $card['status'], 'type' => $type, 'location' => $location]) }}"
         class="category-box {{ $isActive ? 'active-category' : '' }}"
         tabindex="0"
         aria-label="{{ $card['label'] }} Projects"
         style="animation: fadeSlideInRight 0.6s {{ $key * 0.3 }}s forwards;">
        <div class="category-icon">{!! $card['icon'] !!}</div>
        <div class="category-label">{{ $card['label'] }}</div>
      </a>
    @endforeach
  </div>

  {{-- Filter Form --}}
  <form method="GET" action="{{ route('projects.filter') }}" class="filter-form mb-5">
    <div class="container">
      <div class="row align-items-end">
        {{-- Status Dropdown --}}
        <div class="col-md-3 mb-3 mb-md-0">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="">All Statuses</option>
            @foreach(['ongoing', 'complete', 'upcoming'] as $statusOption)
              <option value="{{ $statusOption }}" {{ $currentStatus == $statusOption ? 'selected' : '' }}>
                {{ ucfirst($statusOption) }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Type Dropdown --}}
        <div class="col-md-3 mb-3 mb-md-0">
          <label for="type">Type</label>
          <select name="type" id="type" class="form-control">
            <option value="">All Types</option>
            @foreach($types as $type)
              <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Location Dropdown --}}
        <div class="col-md-3 mb-3 mb-md-0">
          <label for="location">Location</label>
          <select name="location" id="location" class="form-control">
            <option value="">All Locations</option>
            @foreach($locations as $loc)
              <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                {{ $loc }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Submit Button --}}
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
      </div>
    </div>
  </form>

  {{-- Projects Grid --}}
  <section class="benefits">
    <div class="container">
      <div class="row">
        <div class="benefits__content">
          <div class="projectWrap row g-4">
            @forelse ($projects as $project)
              <div class="col-md-3 col-sm-6">
                <div class="benefits__content__single" tabindex="0" role="button" aria-label="View details for {{ $project->name }}">
                  <a href="{{ route('project.details', $project->slug) }}" class="stretched-link"></a>
                  <div class="benefits__content__single__img">
                    <picture class="modify-img">
                      <img src="{{ asset($project->main_image) }}" alt="{{ $project->name }}">
                    </picture>
                  </div>
                  <div class="benefits__content__single__hover">
                    <div class="benefits__content__single__hover__content">
                      <h4>{{ $project->name }}</h4>
                      <p>{{ $project->location }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <p class="text-center fw-semibold my-5">No Projects Found.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection
