<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/assets/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/assets/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print" href="/assets/css/skins/skin-master.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="/assets/css/page-login-alt.css">
</head>
<body>
<div class="blankpage-form-field">
    <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
            <img src="/assets/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">Global connection</span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">

        @if (session('userAdded'))
            <div class="alert alert-success">
                {{ session('userAdded') }}
            </div>
        @endif

		@if (session('loginError'))
            <div class="alert alert-danger">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="login_form" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="your@email.com" value="">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input name="password" type="password" id="password" class="form-control" placeholder="" >
            </div>
            <div class="form-group text-left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberme">
                    <label name="remember_me" class="custom-control-label" for="rememberme">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default float-right">Login</button>
        </form>
    </div>
    <div class="blankpage-footer text-center">
        Don't have an account?  <a href="{{ route('registration') }}"><strong>Register now</strong>
    </div>
</div>
<video poster="/assets/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
    <source src="/assets/media/video/cc.webm" type="video/webm">
    <source src="/assets/media/video/cc.mp4" type="video/mp4">
</video>
<script src="/assets/js/vendors.bundle.js"></script>
</body>
</html>

