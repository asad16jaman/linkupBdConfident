@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i>
                <a href="{{ route('dashboard') }}">Home</a> > News & Events Update
            </span>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="post" action="{{ route('newsEvent.update', $newsEvent->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="table-head">
                                                <i class="fas fa-edit"></i> News & Events Update
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-lg-6">
                                            <div class="form-group row mb-2">
                                                <label for="title" class="col-sm-3 col-form-label">Title <span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" value="{{ old('title', $newsEvent->title) }}"
                                                        class="form-control form-control-sm shadow-none">
                                                    @error('title')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2">
                                                <label for="type" class="col-sm-3 col-form-label">Type <span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="type" class="form-control form-control-sm shadow-none">
                                                        <option value="">Select Type</option>
                                                        <option value="News" {{ old('type', $newsEvent->type) == 'News' ? 'selected' : '' }}>News</option>
                                                        <option value="Event" {{ old('type', $newsEvent->type) == 'Event' ? 'selected' : '' }}>Event</option>
                                                    </select>
                                                    @error('type')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2">
                                                <label for="date" class="col-sm-3 col-form-label">Date <span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="date" value="{{ old('date', $newsEvent->date) }}"
                                                        class="form-control form-control-sm shadow-none">
                                                    @error('date')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2">
                                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control shadow-none"
                                                        onchange="mainThambUrl(this)">
                                                    @error('image')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror

                                                    <div class="mt-2">
                                                        <img src="{{ asset($newsEvent->image ?? 'no.png') }}" id="mainThmb"
                                                            style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;"
                                                            alt="Image Preview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column (Description) -->
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <textarea name="description" rows="10" placeholder="Description"
                                                    class="form-control form-control-sm shadow-none ckeditor">{{ old('description', $newsEvent->description) }}</textarea>
                                                @error('description')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-2">
                                    <div class="clearfix text-end">
                                        <a href="{{ route('newsEvent.index') }}" class="btn btn-danger shadow-none">Back</a>
                                        <button type="submit" class="btn btn-success shadow-none">Update</button>
                                              <hr class="my-2">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-12">
                            <div class="card my-2">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Our News & Events List
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
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($newsEvents as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->date }}</td>
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
                                                        <a href="{{ route('newsEvent.edit', $item->id) }}"
                                                            class="btn btn-edit"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <a href="{{ route('newsEvent.delete', $item->id) }}"
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