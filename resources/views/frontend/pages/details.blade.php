@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .section-bg-gradient-1 {
    background: linear-gradient(to right, #e6f0ff, #ffffff);
  }

  .section-bg-gradient-2 {
    background: linear-gradient(to right, #fff9f0, #ffffff);
  }

  .section-bg-gradient-3 {
    background: linear-gradient(to right, #f0fff4, #ffffff);
  }

  .smart-card {
    border-radius: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
  }

  .smart-list li {
    margin-bottom: 8px;
    list-style-type: square;
  }

  .fancy-gallery img {
    transition: transform 0.3s ease;
    border-radius: 15px;
  }

  .fancy-gallery img:hover {
    transform: scale(1.05);
  }
</style>

<br><br><br>
<section class="project-overview-section py-5 section-bg-gradient-1">
  <div class="container">
    <div class="row d-flex align-items-stretch smart-card overflow-hidden" style="min-height: 400px;">
      <div class="col-md-6 p-0 d-flex">
        <img src="{{ asset($project->feature_image) }}" alt="Project Image"
          class="img-fluid w-100 h-100" style="object-fit: cover;" />
      </div>
      <!-- justify-content-center -->
      <div class="col-md-6 d-flex flex-column bg-white p-4">
        <table class="table mb-0">
          <tbody>
            <tr>
              <td><i class="fa fa-map-marker-alt me-2 text-primary"></i> Title</td>
              <td>{{$project->title}}</td>
            </tr>
            <tr>
              <td><i class="fa fa-map-marker-alt me-2 text-primary"></i> Address</td>
              <td>{{$project->address}}</td>
            </tr>
            <tr>
              <td><i class="fa fa-vector-square me-2 text-primary"></i> Land Area</td>
              <td>{{$project->land_area}} </td>
            </tr>
            <tr>
              <td><i class="fa fa-layer-group me-2 text-primary"></i> No of Floors</td>
              <td>{{$project->no_of_floor}}</td>
            </tr>
            <tr>
              <td style="width: 170px;"><i class="fa fa-building me-2 text-primary"></i> Apartment</td>
              <td>{{$project->appartments}}</td>
            </tr>
            <tr>
              <td><i class="fa fa-parking me-2 text-primary"></i> No of Parking</td>
              <td>{{$project->no_of_parking }}</td>
            </tr>
            <tr>
              <td><i class="fa fa-calendar-alt me-2 text-primary"></i> Handover</td>
              <td>{{$project->handover}}</td>
            </tr>
            <tr>
              <td><i class="fa fa-calendar-alt me-2 text-primary"></i> Flat Size</td>
              <td>{{ $project->size ?? "Not Set Yeat" }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<section class="project-overview-section py-5 section-bg-gradient-2">
  <div class="container">
    <div class="row gx-0 overflow-hidden rounded-3 shadow-lg" style="min-height: 400px; background-color: #fff;">
      <div class="col-md-6 d-flex flex-column  p-3 p-md-4">
        <h4 class="fw-bold">Flat Details:</h4>
        <div class="smart-list p-4 " style="font-size: 15px; line-height: 1.9; color: #333; list-style-type: disc;">
          {!!$project->flat_details!!}
        </div>
        <h4 class="fw-bold mb-4"> Features Details : </h4>
        <div class="smart-list p-4 " style="font-size: 15px; line-height: 1.9; color: #333; list-style-type: disc;">
          {!!$project->features_details!!}
        </div>
        
      </div>
      <!-- Image Column -->
      <div class="col-md-6 d-none d-md-block">
        <div class="h-100 w-100">
          <img src="{{ asset($project->details_image) }}" alt="Project Image"
            class="img-fluid rounded-end h-100 w-100" style="object-fit: cover;" />
        </div>
      </div>
    </div>
  </div>
</section>



<section class="fancy-gallery py-5 section-bg-gradient-1">
  <div class="container">
    <h4 class="fw-bold text-center mb-4 text-primary">
      <i class="fa fa-images me-2"></i> Project Gallery
    </h4>
    <div class="row g-3 justify-content-center">
      @foreach($galleryImages as $img)
      @if($img)
      <div class="col-lg-2 col-md-3 col-sm-4 col-6">
        <a data-fancybox="gallery" href="{{ asset($img) }}" class="d-block">
          <img src="{{ asset($img) }}" class="img-fluid rounded shadow-sm gallery-thumb" alt="Project Image" />
        </a>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</section>

<!-- ✅ Booking Form -->

@if(!empty($project->video))
<section class="project-video-section" style="padding: 40px 0; background-color: #f9f9f9;">
  <div>
    <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Project Video</h2>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
          <iframe src="{{ $project->video }}"
            title="Project Video"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
<div class="container" style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
    <iframe 
        src="{!! $project->map_url !!}" 
        frameborder="0" 
        style="border:0; position:absolute; top:0; left:0; width:100%; height:100%;" 
        allowfullscreen="" 
        aria-hidden="false" 
        tabindex="0">
    </iframe>
</div>
<br>
<section class="book-now-section py-5 section-bg-gradient-3">
  <div class="container">
    <div class="row justify-content-center smart-card bg-white overflow-hidden">
      <div class="col-md-5 d-flex align-items-center justify-content-center p-3">

        <img src="{{ asset($project->book_image) }}" alt="Booking Image"
          class="img-fluid rounded" style="max-height: 400px; object-fit: cover;" />
      </div>
      <div class="col-md-7 d-flex flex-column justify-content-center p-4">
        <h4 class="fw-bold mb-4 text-primary"><i class="fa fa-calendar-check me-2"></i> Book Now</h4>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" id="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" class="form-control" required>
          </div>
          <div class="mb-4">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" class="form-control" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-dark w-100">Book Now</button>
        </form>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
  Fancybox.bind('[data-fancybox="gallery"]', {
    animated: true,
    showClass: "fancybox-fadeIn",
    hideClass: "fancybox-fadeOut",
  });
</script>

@endsection