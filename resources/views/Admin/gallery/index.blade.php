@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> >
                Project Gallery Entry</span>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fab fa-bandcamp"></i> Project Gallery Entry
                        </div>
                    </div>

                    <div class="card-body table-card-body">
                        <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Project <span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="project_id" class="form-control form-control-sm shadow-none">
                                        <option value="">-- Select Project --</option>
                                        @foreach ($project as $item)
                                        <option value="{{ $item->id }}" {{ old('project_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label class="col-sm-3 col-form-label mt-2">Multi Images <span style="color:red">(285x380px)*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="project_image[]" class="form-control shadow-none mt-2"
                                        id="multiImgInput" multiple>
                                    @error('project_image')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror

                                    <div class="mt-2" id="multiImgPreview" style="display: flex; gap: 10px; flex-wrap: wrap;border:2px dotted #999;padding:15px;"></div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Project Image List</div>
                        <div class="float-right">

                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serial = 1; @endphp
                                    @foreach ($projects as $project)
                                    @if($project->galleries->isNotEmpty())
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td style="display: flex; flex-wrap: wrap; gap: 5px; justify-content: center;">
                                            @foreach ($project->galleries as $gallery)
                                            <img src="{{ asset($gallery->project_image) }}" width="30" height="30" alt="" style="border:1px solid #ccc; padding:2px;">
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.edit', $project->id) }}" class="btn btn-edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{ route('gallery.deleteAllByProject', $project->id) }}"
                                                onclick="return confirm('Are you sure to delete ALL images of this project?')"
                                                class="btn btn-delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

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
    // Main image preview
    function previewMainImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('mainImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Multi image preview with remove option
    const multiInput = document.getElementById('multiImgInput');
    const previewBox = document.getElementById('multiImgPreview');
    let fileStore = [];

    multiInput.addEventListener('change', function() {
        const newFiles = Array.from(multiInput.files);
        fileStore = fileStore.concat(newFiles);
        renderMultiPreview();
    });

    function renderMultiPreview() {
        previewBox.innerHTML = '';

        fileStore.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const container = document.createElement('div');
                container.style.position = "relative";

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = "80px";
                img.style.height = "80px";
                img.style.border = "1px solid #999";
                img.style.padding = "2px";

                const btn = document.createElement('button');
                btn.innerText = 'X';
                btn.style.position = 'absolute';
                btn.style.top = '2px';
                btn.style.right = '2px';
                btn.style.background = 'red';
                btn.style.color = 'white';
                btn.style.border = 'none';
                btn.style.borderRadius = '50%';
                btn.style.width = '20px';
                btn.style.height = '20px';
                btn.style.cursor = 'pointer';

                btn.onclick = function() {
                    fileStore.splice(index, 1);
                    renderMultiPreview();
                };

                container.appendChild(img);
                container.appendChild(btn);
                previewBox.appendChild(container);
            };
            reader.readAsDataURL(file);
        });

        const dataTransfer = new DataTransfer();
        fileStore.forEach(file => dataTransfer.items.add(file));
        multiInput.files = dataTransfer.files;
    }
</script>
@endpush