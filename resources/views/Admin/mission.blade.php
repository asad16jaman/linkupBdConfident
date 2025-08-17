@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <!-- Breadcrumb -->
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i>
                <a href="{{ route('dashboard') }}">Home</a> >
                Our Mission, Vision & Values
            </span>
        </div>

        <!-- Card -->
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-edit"></i> Update Mission, Vision & Values</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mission.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Mission -->
                                <div class="col-lg-6 mb-3">
                                    <label for="mission" class="form-label fw-bold">
                                        Our Mission <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="mission" rows="4" class="form-control ckeditor" required>{{ $mission->mission }}</textarea>
                                    @error('mission')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Vision -->
                                <div class="col-lg-6 mb-3">
                                    <label for="vision" class="form-label fw-bold">
                                        Our Vision <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="vision" rows="4" class="form-control ckeditor" required>{{ $mission->vision }}</textarea>
                                    @error('vision')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Values -->
                                <div class="col-lg-12 mb-3">
                                    <label for="values" class="form-label fw-bold">
                                        Our Values <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="values" rows="4" class="form-control ckeditor" required>{{ $mission->values }}</textarea>
                                    @error('values')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="text-end mt-3">
                                <button type="reset" class="btn btn-outline-danger shadow-none">Reset</button>
                                <button type="submit" class="btn btn-success shadow-none">Update</button>
                            </div>
                            <hr class="my-2">
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</main>
@endsection