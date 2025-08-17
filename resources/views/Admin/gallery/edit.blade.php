@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a href="">Home</a> >
                Project Gallery Entry</span>
        </div>
        <div class="row">
            <!-- Left side: Form -->
            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fab fa-bandcamp"></i> Project Gallery Entry
                        </div>
                    </div>

                    <div class="card-body table-card-body">
                        <form method="post" action="{{ route('gallery.update', $project->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Project <span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="project_id" class="form-control form-control-sm shadow-none">
                                        <option value="">-- Select Project --</option>
                                        @foreach ($projects as $item)
                                        <option value="{{ $item->id }}" {{ $project->id == $item->id ? 'selected' : '' }}>
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

                                    <!-- Existing images preview with delete buttons -->
                                    <div class="mt-3" style="display: flex; gap: 10px; flex-wrap: wrap; border: 2px dotted #999; padding: 15px;">
                                        @if ($project->galleries->isNotEmpty())
                                        @foreach ($project->galleries as $gallery)
                                        <div style="position: relative; display: inline-block;">
                                            <img src="{{ asset($gallery->project_image) }}" width="80" height="80" style="border:1px solid #999; padding:2px;">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    <!-- Preview for new selected images -->
                                    <div class="mt-2" id="multiImgPreview" style="display: flex; gap: 10px; flex-wrap: wrap; border: 2px dotted #999; padding: 15px;"></div>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none" id="resetBtn">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right side: Projects list with images -->
            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Project Image List</div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <!-- <th>Title</th> -->
                                        <th>Images</th>
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
    const multiInput = document.getElementById('multiImgInput');
    const previewBox = document.getElementById('multiImgPreview');
    const resetBtn = document.getElementById('resetBtn');
    let fileStore = [];

    multiInput.addEventListener('change', function() {
        const newFiles = Array.from(multiInput.files);

        // ডুপ্লিকেট বাদ দিয়ে নতুন ফাইল যোগ করুন
        newFiles.forEach(newFile => {
            const exists = fileStore.some(f =>
                f.name === newFile.name &&
                f.size === newFile.size &&
                f.lastModified === newFile.lastModified
            );
            if (!exists) {
                fileStore.push(newFile);
            }
        });
        renderMultiPreview();
    });

    resetBtn.addEventListener('click', function() {
        fileStore = [];
        previewBox.innerHTML = '';
        multiInput.value = '';
    });

    function renderMultiPreview() {
        previewBox.innerHTML = '';

        fileStore.forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const container = document.createElement('div');
                container.style.position = "relative";
                container.style.display = "inline-block";
                container.style.marginRight = "10px";

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = "80px";
                img.style.height = "80px";
                img.style.border = "1px solid #999";
                img.style.padding = "2px";

                const btn = document.createElement('button');
                btn.innerText = '×';
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
                    fileStore = fileStore.filter(f =>
                        !(f.name === file.name && f.size === file.size && f.lastModified === file.lastModified)
                    );
                    renderMultiPreview();
                };

                container.appendChild(img);
                container.appendChild(btn);
                previewBox.appendChild(container);
            };
            reader.readAsDataURL(file);
        });

        // ফাইল ইনপুট আপডেট করুন
        const dataTransfer = new DataTransfer();
        fileStore.forEach(file => dataTransfer.items.add(file));
        multiInput.files = dataTransfer.files;
    }
</script>
@endpush