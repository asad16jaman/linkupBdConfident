@extends('layouts.master')
@section('title', 'Register User')
@section('main-content')

    <main>
        <div class="container-fluid">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> >
                    Registration</span>
            </div>
            <div class="card my-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="table-head">
                        @if (@isset($userData))
                            <i class="fas fa-edit"></i> Update User
                        @else
                            <i class="fas fa-user me-1"></i>Add new user
                        @endif

                    </div>
                </div>
                <div class="card-body table-card-body">
                    <div class="row">
                        <form method="POST"
                            action="{{ @$userData ? route('admin.user.update', $userData->id) : route('registration.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="name" class="col-form-label">Name <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="name" value="{{ @$userData->name }}"
                                        class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="username" class="col-form-label">Username <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="username" value="{{ @$userData->username }}"
                                        class="form-control form-control-sm shadow-none @error('username') is-invalid @enderror">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-sm-4">
                                    <label for="email" class="col-form-label">Email <small
                                            class="text-danger">*</small></label>
                                    <input type="email" name="email" value="{{ @$userData->email }}"
                                        class="form-control form-control-sm shadow-none @error('email') is-invalid @enderror"
                                        id="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="inputPassword" class="col-form-label">Password <small
                                            class="text-danger">*</small></label>
                                    <input type="password" name="password" value=""
                                        class="form-control form-control-sm shadow-none @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="image" class="col-form-label">Image</label>
                                    <input class="form-control shadow-none" id="image" type="file" name="image"
                                        onchange="mainThambUrl(this)">
                                    <div class="form-group mt-1">
                                        <div>
                                            <img src="{{ !empty(@$userData) ? asset(@$userData->image) : asset('no.png') }}"
                                                id="mainThmb"
                                                style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ @$userData ? 'Update change' : 'Save change' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card my-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="table-head">
                        <i class="fas fa-users mr-1"></i> All User List
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key=> $user)
                                    <tr class="{{ $user->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td><img class="border" style="height: 40px; width:50px;"
                                                src="{{ asset($user->image) }}" alt=""></td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-edit shadow-none"><i class="fas fa-pencil-alt"></i></a>
                                            @if ($user->id != 1)
                                                <a href="{{ route('admin.user.delete') }}" id="delete"
                                                    data-token="{{ csrf_token() }}" data-id="{{ $user->id }}"
                                                    class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="5">Data Not Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
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
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
