@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                    href="{{ route('dashboard') }}">Home</a> > Company Profile </span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i>Company Profile Update
                        </div>
                    </div>

                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('company_update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Company Name <span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="company_name" placeholder="Company Name"
                                                    value="{{ $info->company_name }}"
                                                    class="form-control form-control-sm shadow-none" required>
                                                @error('com_name')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Phone<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" placeholder="Phone No"
                                                    value="{{ $info->phone }}"
                                                    class="form-control form-control-sm shadow-none" id="phone"
                                                    required>
                                                @error('phone')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <label for="title" class="col-sm-3 col-form-label">Email<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" placeholder="Email Address "
                                                    value="{{ $info->email }}"
                                                    class="form-control form-control-sm shadow-none" id="email"
                                                    required>
                                                @error('email')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <label for="title" class="col-sm-3 col-form-label"> Address<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="address" rows="3" class="form-control form-control-sm shadow-none" required>{{ $info->address }}</textarea>
                                                @error('address')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Footer Slogan<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="footer_slogan" rows="3" class="form-control form-control-sm shadow-none" required>{{ $info->footer_slogan }}</textarea>
                                                @error('address')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            
                                                      <label for="title" class="col-sm-3 col-form-label">Facebook</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="facebook" placeholder="Facebook Link"
                                                    value="{{ $info->facebook }}"
                                                    class="form-control form-control-sm shadow-none" id="facebook">
                                                @error('facebook')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">

                                            <label for="title" class="col-sm-3 col-form-label">LinkedIn</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="linkdin" placeholder="LinkedIn Link"
                                                    value="{{ $info->linkdin }}"
                                                    class="form-control form-control-sm shadow-none" id="facebook">
                                                @error('linkdin')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Twitter</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="twitter" placeholder="Twitter Link"
                                                    value="{{ $info->twitter }}"
                                                    class="form-control form-control-sm shadow-none" id="twitter">
                                                @error('twitter')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Youtube</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="youtube" placeholder="Youtube Link"
                                                    value="{{ $info->youtube }}"
                                                    class="form-control form-control-sm shadow-none">
                                                @error('youtube')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Instagram</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="instagram" placeholder="Instagram Link"
                                                    value="{{ $info->instagram }}"
                                                    class="form-control form-control-sm shadow-none">
                                                @error('instagram')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <label for="map_url" class="col-sm-3 col-form-label">Map<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="map_url" rows="3" class="form-control form-control-sm shadow-none">{{ $info->map_url }}</textarea>
                                                @error('map_url')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <label for="inputPassword" class="col-sm-3 col-form-label">Logo<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="logo" class="form-control shadow-none"
                                                    id="logo" onchange="mainThambUrl(this)">
                                                @error('image')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror

                                                <div class="">
                                                    <img src="{{ $info->logo ? asset($info->logo) : asset('no.png') }}"
                                                        id="mainThmb"
                                                        style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;"
                                                        alt="">

                                                </div>
                                            </div>
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
                            </form>
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