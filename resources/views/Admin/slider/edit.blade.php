@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a>
                > Slider Update</span>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="post" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="table-head">
                                                <i class="fas fa-edit"></i> Slider Update
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Image<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control shadow-none"
                                                id="logo" onchange="mainThambUrl(this)">
                                            @error('image')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror

                                            <div class="">
                                                <img src="{{ asset($slider->image) }}" id="mainThmb"
                                                    style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="clearfix">
                                        <div class="text-end m-auto">
                                            <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                            <button type="submit" class="btn btn-success shadow-none">Update</button>
                                        </div>
                                    </div>
                                </div>


                        </form>
                        <div class="col-lg-6">
                            <div class="card my-2">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Slider List
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
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sliders as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><img width="50" src="{{ asset($item->image) }}" alt=""></td>
                                                    <td>
                                                        <a href="{{ route('slider.edit', $item->id) }}"
                                                            class="btn btn-edit"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <a href="{{ route('slider.delete', $item->id) }}"
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