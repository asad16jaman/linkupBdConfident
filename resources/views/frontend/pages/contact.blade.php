@extends('frontend.layouts.web_master')
@section('title', 'Home')
@section('content')
    <style>
        .right_conatct_social_icon {
            background: grey;
        }

        .contact_us {
            background-color: #f1f1f1;
            padding: 20px;
        }

        .contact_inner {
            background-color: #fff;
            position: relative;
            box-shadow: 20px 22px 44px #cccc;
            border-radius: 25px;
        }

        .contact_field {
            padding: 60px 340px 90px 100px;
        }

        .right_conatct_social_icon {
            height: 100%;
        }

        .contact_field h3 {
            color: #000;
            font-size: 40px;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 10px
        }

        .contact_field p {
            color: #000;
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 35px;
        }

        .contact_field .form-control {
            border-radius: 0px;
            border: none;
            border-bottom: 1px solid #ccc;
        }

        .contact_field .form-control:focus {
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #52357B;
        }

        .contact_field .form-control::placeholder {
            font-size: 13px;
            letter-spacing: 1px;
        }

        .contact_info_sec {
            position: absolute;
            background-color: #666666;
            right: 1px;
            top: 18%;
            height: 340px;
            width: 340px;
            padding: 40px;
            border-radius: 25px 0 0 25px;
        }

        .contact_info_sec h4 {
            letter-spacing: 1px;
            padding-bottom: 15px;
        }

        .info_single {
            margin: 30px 0px;
        }

        .info_single i {
            margin-right: 15px;
        }

        .info_single span {
            font-size: 14px;
            letter-spacing: 1px;
        }

        button.contact_form_submit {
            border: none;
            color: #fff;
            padding: 10px 15px;
            width: 100%;
            margin-top: 25px;
            border-radius: 35px;
            cursor: pointer;
            font-size: 14px;
            letter-spacing: 2px;
        }

        .socil_item_inner li {
            list-style: none;
        }

        .socil_item_inner li a {
            color: #fff;
            margin: 0px 15px;
            font-size: 14px;
        }

        .socil_item_inner {
            padding-bottom: 10px;
        }

        .map_sec {
            padding: 50px 0px;
        }

        .map_inner h4,
        .map_inner p {
            color: #000;
            text-align: center
        }

        .map_inner p {
            font-size: 13px;
        }

        .map_bind {
            margin-top: 50px;
            border-radius: 30px;
            overflow: hidden;
        }

        
  .banner {
    position: relative;
    height: 450px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    overflow: hidden;
    padding-left: 20px;
    padding-right: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    letter-spacing: 6px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

 .banner::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4); 
  backdrop-filter: blur(2px); 
  z-index: 1;
  transition: background 0.3s ease;
}
  .banner h1 {
    position: relative;
    font-size: 4.5rem;
    z-index: 2;
    text-transform: uppercase;
    font-weight: 700;
    margin: 0;
    line-height: 1.1;
    max-width: 900px;
    user-select: none;
  }

  .background-section {
    display: flex;
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 10px;
    gap: 20px;
    flex-wrap: wrap;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .background-text {
    flex: 1 1 500px;
  }

  .background-text h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: #4a148c;
    font-weight: 700;
    position: relative;
  }

  @media (max-width:850px){
    .contact_field {
        padding: 335px 21px 28px 18px;
    }

    .contact_info_sec {
        right: -25px;
        top: 0%;
    }
  }

  @media (max-width:500px){
    .contact_field {
        padding: 335px 21px 28px 18px;
    }

    .contact_info_sec {
        right: -25px;
        top: 0%;
    }
  }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@php
$bannerImage = $chooseUs && $chooseUs->contact_head_image
? asset($chooseUs->contact_head_image)
: asset('no.png');
@endphp
<section class="banner" role="banner" aria-label="About Us Banner" style="background-image: url('{{ $bannerImage }}');">
  <h1 style="color: white;">Contact Us</h1>
</section>

    <section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact_inner">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="contact_form_inner">
                                    <div class="contact_field" style="color: white;">
                                        <h3 >Contatc Us</h3>
                                        <p>Feel Free to contact us any time. We will get back to you as soon as we can!.
                                        </p>
                                        <input type="text" class="form-control form-group" placeholder="Name" />
                                        <input type="text" class="form-control form-group" placeholder="Email" />
                                        <textarea class="form-control form-group" placeholder="Message"></textarea>
                                        <button class="contact_form_submit"
                                            style="background-color: #52357B;">Send</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="right_conatct_social_icon d-flex align-items-end">
                                    <div class="socil_item_inner d-flex">
                                        <li><a href="{{ $info->facebook }}"><i class="fab fa-facebook-square"></i></a></li>
                                        <li><a href="{{ $info->	instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{ $info->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_sec" style="color: white !important;">
                            <h4><span style="color: white;">Contact Info</span></h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset"></i>
                                <span>{{$info->phone}}</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>{{$info->email}}</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>{{$info->address}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <iframe
        src="{!! $company->map_url !!}"
        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
@endsection