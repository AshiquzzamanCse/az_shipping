<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="">

    <title>AZ Shipping | Admin-Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/login/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/login/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/login/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/login/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon"
        href="{{ !empty(optional($setting)->site_favicon) && file_exists(public_path('storage/' . optional($setting)->site_favicon)) ? asset('storage/' . optional($setting)->site_favicon) : asset('frontend/images/no-logo(217-55).jpg') }}"
        type="image/x-icon" />

    <style>
        .position-relative {
            position: relative;
        }

        .bi-eye,
        .bi-eye-slash {
            font-size: 1rem;
            /* Adjust size as needed */
            color: #535151;
            /* Adjust color as needed */
        }

        .form-control {
            padding-right: 2.5rem;
            /* Add space for the eye icon */
        }
    </style>


</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">

                                <div class="col-md-4 pe-md-0">
                                    <div class="d-none d-md-block">
                                        <img alt="Logo" src="{{ asset('backend/login/assets/logo/ship2.jpg') }}"
                                            class="" style="width: 100%; height:500px;" />
                                    </div>
                                </div>


                                <div class="col-md-8 ps-md-0 my-auto">
                                    <div class="auth-form-wrapper px-4 py-5">

                                        <a href="{{ route('admin.login') }}"
                                            class="noble-ui-logo logo-light d-block mb-2 text-center mb-4">

                                            {{-- <img alt="Logo"
                                                src="http://azshipping.net/storage/images/settings/icA040G3xrUQ8qXzWusDxBIXuaNWPNTuf8PKcesl.png"
                                                class="" style="width: 90px; height: 100%;" /> --}}
                                            <h1>AZ Shipping Services</h1>

                                        </a>

                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                                        <form class="forms-sample" action="{{ route('admin.login') }}" method="POST">

                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Or Phone</label>
                                                <input type="text" autocomplete="off"
                                                    class="form-control @error('login') is-invalid @enderror"
                                                    name="login" value="{{ old('login') }}" id="login"
                                                    placeholder="">

                                                @error('login')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 position-relative">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" autocomplete="off" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" autocomplete="current-password" placeholder="">

                                                <i id="togglePassword" class="bi bi-eye position-absolute"
                                                    style="top: 73%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>

                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="remember_me"
                                                    name="remember">

                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>

                                            </div>

                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary me-2 px-3 mb-2 mb-md-0 text-white">Login
                                                </button>
                                            </div>

                                            {{-- <a href="{{ route('admin.password.request') }}"
                                                class="d-block mt-3 text-muted">Forgot Password?
                                                Click Here</a> --}}

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/login/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/login/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/login/assets/js/template.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        });
    </script>

    <!-- endinject -->


</body>

</html>

{{-- <x-admin-guest-layout>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color:  #f5f5f5;">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="{{ route('homepage') }}" class="py-9 mb-5">
                            <img alt="Logo"
                                src="{{ !empty($site->site_logo) && file_exists(public_path('storage/settings/' . $site->site_logo)) ? asset('storage/settings/' . $site->site_logo) : asset('frontend/images/no-logo(217-55).jpg') }}"
                                class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #179ef7">Welcome to
                            {{ !empty($site->site_name) ? $site->site_name : 'NGen IT Training' }}</h1>
                        <p class="fw-bold fs-2" style="color: #000;">Discover Amazing
                            {{ !empty($site->site_name) ? $site->site_name : 'NGen IT Training' }}
                            <br />with great build tools
                        </p>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form class="form w-100" action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In to
                                    {{ !empty($site->site_name) ? $site->site_name : 'NGen IT Training' }}</h1>
                                
                            </div>
                            <div class="fv-row mb-10">
                                <x-metronic.label
                                    class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</x-metronic.label>
                                <x-metronic.input type="email" name="email"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Enter your email address" value="{{ old('email') }}"
                                    autocomplete="off"></x-metronic.input>
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <x-metronic.label
                                        class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</x-metronic.label>
                                    @if (Route::has('admin.password.request'))
                                        <a href="{{ route('admin.password.request') }}"
                                            class="link-primary fs-6 fw-bolder">
                                            {{ __('Forgot password ?') }}</a>
                                    @endif
                                </div>
                                <x-metronic.input type="password" name="password"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Enter your password" autocomplete="off"></x-metronic.input>
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input id="remember_me" type="checkbox" class="form-check-input"
                                                name="remember">
                                            <x-metronic.label for="remember_me"
                                                class="form-check-label">{{ __('Remember me') }}</x-metronic.label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <x-metronic.button type="submit" class="primary btn-lg w-100 mb-5 rounded-1">
                                    <span class="indicator-label"> {{ __('Sign In') }}</span>
                                </x-metronic.button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-admin-guest-layout> --}}
