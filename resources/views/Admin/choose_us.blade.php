@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> 
                <a href="{{ route('dashboard') }}">Home</a> > Why Choose Us 
            </span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Why Choose Us Update
                        </div>
                    </div>

                    <div class="card-body table-card-body">
                        <form method="post" action="{{ route('chooseUsUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Left Section -->
                              <div class="col-lg-6">
    <div class="form-group row">
        <!-- Title -->
        <label for="title" class="col-sm-3 col-form-label">Title <span style="color:red">*</span></label>
        <div class="col-sm-9">
            <input type="text" name="title" class="form-control form-control-sm shadow-none" value="{{ $chooseUs->title }}" required>
            @error('title')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <label for="description" class="col-sm-3 col-form-label mt-3">Description <span style="color:red">*</span></label>
        <div class="col-sm-9 mt-3">
            <textarea name="description" rows="3" class="form-control form-control-sm shadow-none ck-editor" required>{{ $chooseUs->description }}</textarea>
            @error('description')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <!-- Why Choose US Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Why Choose US Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="head_image" class="form-control shadow-none" onchange="previewHeadImage(this)">
            @error('head_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->head_image ? asset($chooseUs->head_image) : asset('no.png') }}" id="previewHeadImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- Mission Vission Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Mission Vision Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="mission_image" class="form-control shadow-none" onchange="previewMissionHeadImage(this)">
            @error('mission_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->mission_image ? asset($chooseUs->mission_image) : asset('no.png') }}" id="previewMissionHeadImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- News and Events Head Image -->
        <label class="col-sm-3 col-form-label mt-3">News And Events Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="news_events_image" class="form-control shadow-none" onchange="previewEventsHeadImage(this)">
            @error('news_events_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->news_events_image ? asset($chooseUs->news_events_image) : asset('no.png') }}" id="previewEventsHeadImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>
    </div>
</div>

                              <!-- Right Section -->
<div class="col-lg-6">
    <div class="form-group row">
        <!-- Main Image -->
        <label for="image" class="col-sm-3 col-form-label">Image <span style="color:red">*</span></label>
        <div class="col-sm-9">
            <input type="file" name="image" class="form-control shadow-none" onchange="previewMainImage(this)">
            @error('image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->image ? asset($chooseUs->image) : asset('no.png') }}" id="previewMainImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- Management Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Management Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="management_head_image" class="form-control shadow-none" onchange="previewManagementImage(this)">
            @error('management_head_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->management_head_image ? asset($chooseUs->management_head_image) : asset('no.png') }}" id="previewManagementImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- Director Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Director Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="director_head_image" class="form-control shadow-none" onchange="previewDirectorImage(this)">
            @error('director_head_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->director_head_image ? asset($chooseUs->director_head_image) : asset('no.png') }}" id="previewDirectorImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- Contact Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Contact Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="contact_head_image" class="form-control shadow-none" onchange="previewContactImage(this)">
            @error('contact_head_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->contact_head_image ? asset($chooseUs->contact_head_image) : asset('no.png') }}" id="previewContactImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>

        <!-- Status Head Image -->
        <label class="col-sm-3 col-form-label mt-3">Status Head Image</label>
        <div class="col-sm-9 mt-3">
            <input type="file" name="status_head_image" class="form-control shadow-none" onchange="previewStatusImage(this)">
            @error('status_head_image')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="mt-2">
                <img src="{{ $chooseUs->status_head_image ? asset($chooseUs->status_head_image) : asset('no.png') }}" id="previewStatusImage" style="width:100px; height:100px; border:1px solid #999; padding:2px;" alt="">
                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
            </div>
        </div>
    </div>
</div>

                            </div>
                            <hr class="my-2">
                            <div class="text-end m-auto">
                                <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                <button type="submit" class="btn btn-success shadow-none">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
   function previewManagementImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewManagementImage').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}


   function previewMissionHeadImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewMissionHeadImage').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}



   function previewDirectorImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewDirectorImage').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

    function previewMainImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewMainImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewManagementImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewManagementImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function previewEventsHeadImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewEventsHeadImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewContactImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewContactImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewStatusImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewStatusImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
