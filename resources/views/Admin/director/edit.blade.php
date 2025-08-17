@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i>
                <a href="{{ route('dashboard') }}">Home</a> > Board of Directors Update
            </span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('directors.update', $director->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="table-head">
                                                <i class="fas fa-edit"></i> Board of Directors Update
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <!-- Name -->
                                        <label class="col-sm-3 col-form-label">Name<span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" placeholder="Board Of Directors Name"
                                                value="{{ $director->name }}"
                                                class="form-control form-control-sm shadow-none">
                                            @error('name')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Designation -->
                                        <label class="col-sm-3 col-form-label">Designation<span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="designation" placeholder="Board Of Directors Designation"
                                                value="{{ $director->designation }}"
                                                class="form-control form-control-sm shadow-none">
                                            @error('designation')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Message -->
                                        <label class="col-sm-3 col-form-label">Message<span style="color:red">*</span></label>
                                        <div class="col-sm-9 mb-2">
                                            <textarea name="message" rows="3" placeholder="Board Of Directors Message"
                                                class="form-control form-control-sm shadow-none ckeditor">{{ $director->message }}</textarea>
                                            @error('message')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Image -->
                                        <label class="col-sm-3 col-form-label">Image<span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control shadow-none" id="logo" onchange="mainThambUrl(this)">
                                            @error('image')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror

                                            @if($director->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset($director->image) }}" id="mainThmb"
                                                        style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="Existing Image">
                                                </div>
                                            @endif
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

                        <!-- Directors List Table -->
                        <div class="col-lg-6">
                            <div class="card my-2">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Our Board Of Directors List</div>
                                </div>
                                <div class="card-body table-card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($directors as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->designation }}</td>
                                                        <td>
                                                            @php
                                                                $message = strip_tags($item->message);
                                                                $words = explode(' ', $message);
                                                                $limitedDescription = implode(' ', array_slice($words, 0, 20));
                                                            @endphp
                                                            {!! $limitedDescription !!}...
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('directors.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ route('directors.delete', $item->id) }}"
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
                        </div> <!-- End of col-lg-6 -->
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
            reader.onload = function (e) {
                $('#mainThmb').attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
