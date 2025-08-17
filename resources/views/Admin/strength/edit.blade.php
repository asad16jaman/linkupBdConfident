@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{ route('dashboard') }}">Home</a>
                > Our Strength Update</span>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="post" action="{{ route('strength.update',$strength->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="table-head">
                                                <i class="fas fa-edit"></i> Our Strength Update
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 col-form-label">Title<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" placeholder="Title"
                                                value="{{ $strength->title}}"
                                                class="form-control form-control-sm shadow-none">
                                            @error('title')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="title" class="col-sm-3 col-form-label">Description<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9 mb-2">
                                            <textarea name="description" rows="3" placeholder=" Description"
                                                class="form-control form-control-sm shadow-none ckeditor">{{$strength->description }}</textarea>
                                            @error('description')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
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
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Our Strength List
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
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($strengths as $key => $item)
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
                                               
                                                    <td>
                                                        <a href="{{ route('strength.edit', $item->id) }}"
                                                            class="btn btn-edit"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <a href="{{ route('strength.delete', $item->id) }}"
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
