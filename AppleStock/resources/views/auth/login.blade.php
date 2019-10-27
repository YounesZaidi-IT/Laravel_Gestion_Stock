<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>{{ config('app.name', '') }}</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="{{ asset('Template/css/login-v1.demo4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Template/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Template/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('Template/images/favicon.ico') }}" />
</head>

<body style="background-image: url({{ asset('Template/images/header.jpg') }}); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url({{ asset('Template/images/bg-4.jpg') }});">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            <img src="{{ asset('Template/images/logo-4.png') }}">
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">Welcome to Apple Stock!</h3>
                            <h4 class="kt-login__subtitle">Simple Project using Laravel ..<h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                                &copy 2019 Younes Zaidi
                            </div>
                            <div class="kt-login__menu">
                                <a onClick="alert('Only Test Project')"  class="kt-link">Privacy</a>
                                <a onClick="alert('Soon , but You can contact us in zaidiyounesios@gmail.com')" class="kt-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                    <div class="kt-login__head">
                        <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
                        <a href="#" class="kt-link kt-login__signup-link" onClick="alert('Soon , but You can contact us in zaidiyounesios@gmail.com')" >Please Contact Admin!</a>
                    </div>
                    <div class="kt-login__body">
                        <div class="kt-login__form">
                            <div class="kt-login__title">
                                <h3>Sign In</h3>
                            </div>
                            <form method="POST" class="kt-form" action="{{ route('login') }}" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password"> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                                </div>
                                <div class="kt-login__actions">
                                    <div class="kt-link kt-login__link-forgot">
                                        <!--Forgot Password ?-->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </form>

                            <div class="kt-login__divider">
                                <div class="kt-divider">
                                    <span></span>
                                    <span>OR</span>
                                    <span></span>
                                </div>
                            </div>
                            <!--<div class="kt-login__options">
                                <a href="#" class="btn btn-primary kt-btn">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="#" class="btn btn-info kt-btn">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="#" class="btn btn-danger kt-btn">
                                    <i class="fab fa-google"></i> Google
                                </a>
                            </div>
							--->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#366cf3",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <script src="{{ asset('Template/js/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('Template/js/scripts.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('Template/js/login-v1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('Template/js/app.bundle.js') }}" type="text/javascript"></script>

</body>

</html>