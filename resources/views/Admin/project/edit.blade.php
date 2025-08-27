@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Project">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading"><i class="fas fa-home"></i>
                <a href="{{ route('dashboard') }}">Home</a> > Our Project Update
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Our Project Update
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ route('project.update',$project->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                {{-- 3x3 Inputs --}}
                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label>Title<span style="color:red">*</span></label>
                                        <input type="text" name="title" value="{{ $project->title }}" placeholder="Title" class="form-control form-control-sm shadow-none">
                                        @error('title') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="status">Status <span style="color:red">*</span></label>
                                        <select name="status" class="form-control form-control-sm shadow-none">
                                            <option value="{{ $project->status}}">{{ $project->status}}</option>
                                            <option value="Ongoing" {{ old('status', $project->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                            <option value="Complete" {{ old('status', $project->status) == 'Complete' ? 'selected' : '' }}>Complete</option>
                                            <option value="Upcoming" {{ old('status', $project->status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                        </select>
                                        @error('status') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="type">Type <span style="color:red">*</span></label>
                                        <select name="type" class="form-control form-control-sm shadow-none">
                                            <option value="{{ $project->type}}">{{ $project->type}}</option>
                                            <option value="Residential" {{ old('type', $project->type) == 'Residential' ? 'selected' : '' }}>Residential</option>
                                            <option value="Commercial" {{ old('type', $project->type) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                        </select>
                                        @error('type') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Location<span style="color:red">*</span></label>
                                        <input type="text" name="location" value="{{ $project->location }}" placeholder="Location" class="form-control form-control-sm shadow-none">
                                        @error('location') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Handover<span style="color:red">*</span></label>
                                        <input type="date" name="handover" value="{{ $project->handover }}" class="form-control form-control-sm shadow-none">
                                        @error('handover') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label>Address<span style="color:red">*</span></label>
                                        <input type="text" name="address" value="{{ $project->address }}" placeholder="Address" class="form-control form-control-sm shadow-none">
                                        @error('address') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Land Area<span style="color:red">*</span></label>
                                        <input type="text" name="land_area" value="{{ $project->land_area }}" placeholder="Land Area" class="form-control form-control-sm shadow-none">
                                        @error('land_area') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>No of Floors<span style="color:red">*</span></label>
                                        <input type="text" name="no_of_floor" value="{{ $project->no_of_floor}}" placeholder="No of Floors" class="form-control form-control-sm shadow-none">
                                        @error('no_of_floor') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Location on Map<span style="color:red">*</span></label>
                                        <input type="text" name="map_url" value="{{ $project->map_url}}" placeholder="Location On Map" class="form-control form-control-sm shadow-none">
                                        @error('map_url') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Flat Size<span style="color:red">*</span></label>
                                        <input type="text" name="size" value="{{ $project->size }}" placeholder="Flat Size" class="form-control form-control-sm shadow-none">
                                        @error('size') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label>Apartments<span style="color:red">*</span></label>
                                        <input type="text" name="appartments" value="{{ $project->appartments}}" placeholder="Apartments" class="form-control form-control-sm shadow-none">
                                        @error('appartments') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>No of Parking<span style="color:red">*</span></label>
                                        <input type="number" name="no_of_parking" value="{{ $project->no_of_parking}}" placeholder="No of Parking" class="form-control form-control-sm shadow-none">
                                        @error('no_of_parking') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Collection<span style="color:red">*</span></label>
                                        <input type="text" name="collection" value="{{ $project->collection}}" placeholder="Collection" class="form-control form-control-sm shadow-none">
                                        @error('collection') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Video</label>
                                        <input type="text" name="video" value="{{ $project->video}}" placeholder="Project Tour video" class="form-control form-control-sm shadow-none">
                                        @error('video') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- Flat Details Section --}}
                                <div class="col-lg-6">
                                    <div class="card shadow-sm border-0 mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">📝 Flat Details</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea name="flat_details" rows="6" class="form-control form-control-sm shadow-none ckeditor" placeholder="Enter flat details...">{!! $project->flat_details !!}</textarea>
                                                @error('flat_details') <span style="color: red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card shadow-sm border-0 mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Features Details</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea name="features_details" rows="6" class="form-control form-control-sm shadow-none ckeditor" placeholder="Enter features_details...">{!! $project->features_details !!}</textarea>
                                                @error('features_details') <span style="color: red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                {{-- Image Upload Section --}}
                                <div class="col-lg-6">
                                    <div class="card shadow-sm border-0 mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">🖼️ Upload Images</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                {{-- Main Image --}}
                                                <div class="col-md-6">
                                                    <label for="main_image" class="form-label">Main Image</label>
                                                    <input type="file" name="main_image" class="form-control form-control-sm shadow-none" onchange="previewImage(this, 'main_image')">
                                                    <div class="mt-2">
                                                        <img src="{{ asset($project->main_image) }}" id="preview-main_image" style="  height: 45px; width:45px; border: 1px solid #ccc; object-fit: cover;" alt="">
                                                    </div>
                                                    @error('main_image') <span style="color: red">{{ $message }}</span> @enderror
                                                </div>

                                                {{-- Details Image --}}
                                                <div class="col-md-6">
                                                    <label for="details_image" class="form-label">Details Image</label>
                                                    <input type="file" name="details_image" class="form-control form-control-sm shadow-none" onchange="previewImage(this, 'details_image')">
                                                    <div class="mt-2">
                                                        <img src="{{ asset($project->details_image) }}" id="preview-details_image" style=" height: 45px; width:45px; border: 1px solid #ccc; object-fit: cover;" alt="">
                                                    </div>
                                                    @error('details_image') <span style="color: red">{{ $message }}</span> @enderror
                                                </div>

                                                {{-- Feature Image --}}
                                                <div class="col-md-6">
                                                    <label for="feature_image" class="form-label">Feature Image</label>
                                                    <input type="file" name="feature_image" class="form-control form-control-sm shadow-none" onchange="previewImage(this, 'feature_image')">
                                                    <div class="mt-2">
                                                        <img src="{{ asset($project->feature_image) }}" id="preview-feature_image" style="height: 45px; width:45px; border: 1px solid #ccc; object-fit: cover;" alt="">
                                                    </div>
                                                    @error('feature_image') <span style="color: red">{{ $message }}</span> @enderror
                                                </div>

                                                {{-- Book Image --}}
                                                <div class="col-md-6">
                                                    <label for="book_image" class="form-label">Book Image</label>
                                                    <input type="file" name="book_image" class="form-control form-control-sm shadow-none" onchange="previewImage(this, 'book_image')">
                                                    <div class="mt-2">
                                                        <img src="{{ asset($project->book_image) }}" id="preview-book_image" style=" height: 45px; width:45px; border: 1px solid #ccc; object-fit: cover;" alt="">
                                                    </div>
                                                    @error('book_image') <span style="color: red">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2">

                                {{-- Buttons --}}
                                <div class="col-lg-12 text-end mt-3">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">Update</button>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-12">
                            <div class="card my-2">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="table-head"><i class="fas fa-table me-1"></i> Our Project List
                                    </div>
                                    <div class="float-right">

                                    </div>
                                </div>
                                <div class="card-body table-card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" id="datatablesSimple"
                                            width="50%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Type</th>
                                                    <th>Location</th>
                                                    <th>Address</th>
                                                    <th>Land Area</th>
                                                    <th>Number of Floors</th>
                                                    <th>Apartments</th>
                                                    <th>No. of Parking</th>
                                                    <th>Flat Details</th>
                                                    <th>Collection</th>
                                                    <th>Handover Date</th>
                                                    <th>Main Image</th>
                                                    <th>Details Image</th>
                                                    <th>Feature Image</th>
                                                    <th>Book Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $key => $item)
                                                <tr>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->location }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->land_area }}</td>
                                                    <td>{{ $item->no_of_floor }}</td>
                                                    <td>{{ $item->appartments }}</td>
                                                    <td>{{ $item->no_of_parking }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit(strip_tags($item->flat_details), 20) !!}</td>

                                                    <td>{{ $item->collection }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->handover)->format('d M Y') }}</td>
                                                    <td><img width="50" src="{{ asset($item->main_image) }}" alt=""></td>
                                                    <td><img width="50" src="{{ asset($item->details_image) }}" alt=""></td>
                                                    <td><img width="50" src="{{ asset($item->feature_image) }}" alt=""></td>
                                                    <td><img width="50" src="{{ asset($item->book_image) }}" alt=""></td>
                                                    <td>
                                                        <a href="{{ route('project.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{ route('project.delete', $item->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-delete"><i class="fa fa-trash"></i></a>
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
    function previewImage(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-' + id).src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush