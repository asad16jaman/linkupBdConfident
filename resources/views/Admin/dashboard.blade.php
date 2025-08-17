@extends('layouts.master')
@section('title', 'Our Project')
@section('main-content')
<main>
    <div class="container-fluid">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('dashboard')}}">Home</a> > Dashboard</span> <a href="" style="float: right"> Go to website </a>
        </div>
        <div class="row mt-3">
            <div class="dashboard-logo text-center pt-3 pb-4">
                {{-- <h1>{{ $info->company_name}}</h1> --}}
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{route('admin.registration')}}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-th-list fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Create User</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('admin.logout') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-sign-out-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Log-out</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
