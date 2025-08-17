<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend_asset/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back_asset/css/bootstrap-4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back_asset/css/login.css') }}" />
    <link href="{{ asset('back_asset/css/toastr.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('back_asset/css/sweetalert.css') }}" />
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card login-card">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="{{ asset('back_asset/images/login-otp-banner.webp') }}" alt="login"
                                    class="login-card-img" />
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">

                                    <div class="brand-wrapper mb-3" style="text-align: center">
                                        <img src="{{ asset($info->logo)}}" alt="logo" class="logo" />

                                    </div>
                                    <p class="login-card-description" style="text-align: center">
                                        {{$info->company_name}}
                                    </p>
                                    @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif

                                    @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    @yield('main-content')
                                    <form action="{{ route('login.check') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Username</label>
                                            <input type="text" name="username" id="username"
                                                class="form-control shadow-none @error('username') is-invalid @enderror"
                                                value="{{ old('username') }}" placeholder="username" />
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('password') }}"
                                                class="form-control shadow-none @error('password') is-invalid @enderror"
                                                placeholder="Password" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <input type="submit" name="login" id="login"
                                            class="btn btn-block login-btn mb-4 shadow-none" value="Login" />
                                    </form>
                                    {{-- <a href="#!" class="forgot-password-link">Forgot password?</a> --}}
                                    <nav class="login-card-footer-nav">
                                        <a href="#!">Copyright &copy; {{ date('Y') }}</a>
                                        <a href="#!"></a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('back_asset/js/toastr.min.js') }}"></script>
    <script src="{{ asset('back_asset/js/sweetalert.js') }}" type="text/javascript"></script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 3000); // 5 secs
        });
    </script>
    <script>
        @if(Session::has('update'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('update') }}");
        @endif

        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif
        @if(Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
        @endif


        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>