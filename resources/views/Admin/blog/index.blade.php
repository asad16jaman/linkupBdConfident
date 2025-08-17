@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a>
                > Blogs Entry</span>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="table-head">
                                                <i class="fas fa-edit"></i> Blogs Entry
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row mb-2">
                                                <label for="title" class="col-sm-3 col-form-label">Title <span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"
                                                        class="form-control form-control-sm shadow-none">
                                                    @error('title')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2">
                                                <label for="image" class="col-sm-3 col-form-label">Image <span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control shadow-none"
                                                        id="logo" onchange="mainThambUrl(this)">
                                                    @error('image')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror

                                                    <div class="mt-2">
                                                        <img src="{{ asset('no.png') }}" id="mainThmb"
                                                            style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <!-- <label for="description" class="col-form-label">Description <span style="color:red">*</span></label> -->
                                                <textarea name="description" rows="10" placeholder="Description"
                                                    class="form-control form-control-sm shadow-none ckeditor">{{ old('description') }}</textarea>
                                                @error('description')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-2">
                                    <div class="clearfix text-end">
                                        <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                        <button type="submit" class="btn btn-success shadow-none">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-12">
                            <div class="card my-2">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Our Blogs List
                                    </div>
                                    <div class="float-right">

                                    </div>
                                </div>
                                <div class="card-body table-card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" id="datatablesSimple"
                                            width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>
                                                        @php
                                                        $description = strip_tags($item->description);
                                                        $words = explode(' ', $description);
                                                        $limitedDescription = implode(' ', array_slice($words, 0, 20));
                                                        @endphp
                                                        {!! $limitedDescription !!}...
                                                    </td>
                                                    <td><img width="50" src="{{ asset($item->image) }}" alt=""></td>
                                                    <td>
                                                        <a href="{{ route('blogs.edit', $item->id) }}"
                                                            class="btn btn-edit"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <a href="{{ route('blogs.delete', $item->id) }}"
                                                            onclick="return confirm('Are You Sure?')"
                                                            class="btn btn-delete"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
    function mainThambUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush