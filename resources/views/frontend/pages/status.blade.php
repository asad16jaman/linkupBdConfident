@extends('frontend.layouts.web_master')
@section('content')
<style>
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
</style>

@php
$currentStatus = $currentStatus ?? request('status') ?? null;

$categories = [
['status' => 'ongoing', 'label' => 'Ongoing', 'icon' => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.5v-5h-2v5Zm-1-7a1 1 0 1 1 1-1 1.001 1.001 0 0 1-1 1Z" />
</svg>
'],
['status' => 'complete', 'label' => 'Complete', 'icon' => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19l12-12-1.4-1.4z" />
</svg>
'],
['status' => 'upcoming', 'label' => 'Upcoming', 'icon' => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M12 4a8 8 0 1 0 8 8 8.01 8.01 0 0 0-8-8Zm1 11h-2v-6h2Z" />
</svg>
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
<section class="banner" role="banner" aria-label="Project Banner" style="background-image: url('{{ $bannerImage }}'); padding: 60px 20px; background-size: cover; background-position: center; text-align: center;">
    <h1 style="color: white; font-size: 36px; font-weight: bold;">
        {{ $currentStatus ? ucfirst($currentStatus) . ' Projects' : 'All Projects' }} ({{ $projects->count() }})
    </h1>
</section>
{{-- Status Buttons Panel --}}
<div class="category-panel container" style="margin-top: 30px; display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
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
            style="animation: fadeSlideInRight 0.6s {{ $key * 0.3 }}s forwards; background: #f5f5f5; border-radius: 10px; padding: 15px 25px; display: flex; flex-direction: column; align-items: center; text-align: center; color: #333; text-decoration: none; transition: all 0.3s;">
            <div class="category-icon" style="font-size: 24px;">{!! $card['icon'] !!}</div>
            <div class="category-label" style="margin-top: 8px; font-weight: 600;">{{ $card['label'] }}</div>
        </a>
    @endforeach
</div>
<div class="filter-section-wrapper" style="position: relative; overflow: hidden; margin-top: 50px;">
    <div style="
        position: relative;
        z-index: 1;
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        border-radius: 12px;
        max-width: 1000px;
        margin: auto;
    ">
        <form method="GET" action="{{ route('projects.filter') }}" class="filter-form" >
            <div style="display: flex; flex-wrap: wrap; justify-content: center; row-gap: 20px; column-gap: 20px;">
                {{-- Status --}}
                <div style="min-width: 180px; flex: 1 1 180px;">
                    <label for="status" style="font-weight: 600; color: black; display: block; margin-bottom: 6px;">Status</label>
                    <select name="status" id="status" style="width: 100%; height: 42px; padding: 0 14px; border-radius: 8px; border: none; background-color: #e9814c; color: white; font-weight: 600; cursor: pointer; appearance: none; background-image: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%23fff%27 stroke-width=%272%27%3e%3cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 d=%27M19 9l-7 7-7-7%27 /%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 12px center; background-size: 16px 16px; transition: background-color 0.3s ease;"
                        onfocus="this.style.backgroundColor='#d26f32'"
                        onblur="this.style.backgroundColor='#e9814c'">
                        <option value="">All Status</option>
                        @foreach(['ongoing', 'complete', 'upcoming'] as $statusOption)
                            <option value="{{ $statusOption }}" {{ $currentStatus == $statusOption ? 'selected' : '' }}>
                                {{ ucfirst($statusOption) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Type --}}
                <div style="min-width: 180px; flex: 1 1 180px;">
                    <label for="type" style="font-weight: 600; color: black; display: block; margin-bottom: 6px;">Type</label>
                    <select name="type" id="type" style="width: 100%; height: 42px; padding: 0 14px; border-radius: 8px; border: none; background-color: #2d5ba9; color: white; font-weight: 600; cursor: pointer; appearance: none; background-image: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%23fff%27 stroke-width=%272%27%3e%3cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 d=%27M19 9l-7 7-7-7%27 /%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 12px center; background-size: 16px 16px; transition: background-color 0.3s ease;"
                        onfocus="this.style.backgroundColor='#24477e'"
                        onblur="this.style.backgroundColor='#2d5ba9'">
                        <option value="">All Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Location --}}
                <div style="min-width: 180px; flex: 1 1 180px;">
                    <label for="location" style="font-weight: 600; color: black; display: block; margin-bottom: 6px;">Location</label>
                    <select name="location" id="location" style="width: 100%; height: 42px; padding: 0 14px; border-radius: 8px; border: none; background-color: #8492d8; color: white; font-weight: 600; cursor: pointer; appearance: none; background-image: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%23fff%27 stroke-width=%272%27%3e%3cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 d=%27M19 9l-7 7-7-7%27 /%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 12px center; background-size: 16px 16px; transition: background-color 0.3s ease;"
                        onfocus="this.style.backgroundColor='#6879bf'"
                        onblur="this.style.backgroundColor='#8492d8'">
                        <option value="">All Locations</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                                {{ $loc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Button --}}
                <div style="min-width: 140px; flex: 1 1 140px;">
                    <button type="submit" class="btn" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; height: 42px; background: linear-gradient(135deg, #e9814c, #cc723f); margin-top:25px; color: white; font-weight: 700; border: none; border-radius: 8px; cursor: pointer; transition: background 0.3s ease, user-select: none; white-space: nowrap;"
                        onmouseover="this.style.background='linear-gradient(135deg, #cc723f, #b26134)'"
                        onmouseout="this.style.background='linear-gradient(135deg, #e9814c, #cc723f)'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="filter-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true" style="width: 20px; height: 20px; stroke: white;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6.414 6.414a2 2 0 00-.586 1.414V18a1 1 0 01-2 0v-3.465a2 2 0 00-.586-1.414L3.293 6.707A1 1 0 013 6V4z" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


    {{-- Projects Grid --}}
    <section class="benefits">
        <div class="container">
            <div class="row">
                <div class="benefits__content">
                    <div class="projectWrap row">
                        @forelse ($projects as $project)
                        <div class="col-md-3">
                            <div class="benefits__content__single">
                                <a href="{{ route('project.details', $project->slug) }}"></a>
                                <div class="benefits__content__single__img">
                                    <picture class="modify-img">
                                        <img src="{{ asset($project->main_image) }}" alt="{{ $project->name }}">
                                    </picture>
                                </div>
                                <div class="benefits__content__single__hover">
                                    <div class="benefits__content__single__hover__content">
                                        <h4>{{ $project->title }}</h4>
                                        <p>{{ $project->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p style="text-align:center; font-weight:500; margin:30px 0;">No {{ ucfirst(@$status) }} Projects Found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection