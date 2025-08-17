@extends('layouts.master')
@section('title', 'Message From CEO')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Home</a> / Message From CEO
            </span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update CEO Message
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <form method="POST" action="{{ route('Ceo.DirectorUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <!-- Title -->
                                        <label class="col-sm-3 col-form-label">Title <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control form-control-sm shadow-none"
                                                value="{{ @$message->title }}" required>
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <!-- Description -->
                                        <label class="col-sm-3 col-form-label mt-3">Description <span class="text-danger">*</span></label>
                                        <div class="col-sm-9 mt-3">
                                            <textarea name="description" rows="4"
                                                class="form-control form-control-sm shadow-none ck-editor"
                                                required>{{ @$message->description }}</textarea>
                                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <!-- Head Image -->
                                        <label class="col-sm-3 col-form-label mt-3">Head Image</label>
                                        <div class="col-sm-9 mt-3">
                                            <input type="file" name="head_image_ceo" class="form-control shadow-none" onchange="previewHeadImage(this)">
                                            @error('head_image_ceo')<span class="text-danger">{{ $message }}</span>@enderror

                                            <div class="mt-2">
                                                <img id="previewHeadImage" 
                                                     src="{{ @$message->head_image_ceo ? asset(@$message->head_image_ceo) : asset('no.png') }}" 
                                                     alt="Preview Image"
                                                     style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;">
                                                <div style="color: red; font-size: 13px;">Recommended size: 1500 x 845</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div class="text-end">
                                <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                <button type="submit" class="btn btn-success shadow-none">Update</button>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('scripts')
<script>
    function previewHeadImage(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewHeadImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
