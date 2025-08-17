@extends('layouts.web_master')
@section('main_content')

<!--Breadcrumb start-->
<div class="ed_pagetitle" style="  background-image: url('{{ asset($banner->about_banner) }}');
    background-position: 100% 100%;
    background-repeat: no-repeat;">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="page_title">
                    <h2>Alumni Password Recovery</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">home</a></li>
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li>Alumni Password Recovery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
<div class="ed_transprentbg ed_toppadder80 " style="padding-bottom:5rem">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12" style="box-shadow: 0px 5px 20px -8px rgba(0, 0, 0, 0.5);border-radius: 15px 0 25px 0; ">
                <div class="logo ed_toppadder40">
                    <img src="{{ asset($info->logo)}}" alt="">
                </div>
                <div class="company_content" style="text-align: center;">
                    <h4 style="color:#167ac6">{{ $info->company_name}}</h4>
                    <div class="slogun">
                        <h6 style="font-family: 'Lucida Calligraphy', cursive, sans-serif;color:black">{{ $info->slogun }}</h6>
                        <h6 style="color:black">{{ $info->registered_address}}</h6>
                        <h6 style="color:black">Phone/Mobile: {{ $info->phone}} , Email: {{ $info->email}} </h>
                            <div style="text-align: center;margin-top:5px">
                                <h5 style="color:#167ac6; border: 6px double black; padding: 5px; display: inline-block;">
                                    Alumni Panel password recover
                                </h5>
                            </div>
                            </h5>
                    </div>
                </div>
                <form action="{{ route('ResetPass') }}" method="post" class="form row m-0">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    </div>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group mt-3">
                        <label class="control-label">New Password:</label>
                        <div style="position: relative; width: 100%;">
                            <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Enter New Password" value="{{ old('password') }}" required style="padding-right: 40px;">
                            <i class="fa fa-eye" id="eyeIcon" onclick="togglePasswordVisibility()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                        </div>


                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirmed Password:</label>
                        <div style="position: relative; width: 100%;">
                        <input type="password" name="password_confirmation" id="loginPasswords" class="form-control" placeholder="Enter Confirm Password" value="{{ old('password_confirmation') }}" required>
                        <i class="fa fa-eye" id="eyeIcons" onclick="togglePasswordVisibilitys()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                        </div>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn ed_btn ed_orange pull-right mt-5 mb-3">Change Password</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

