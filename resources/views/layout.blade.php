<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Global connection | @yield('title', 'Home page') </title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/assets/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/assets/css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="/assets/css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="/assets/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/assets/css/fa-brands.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
    <a class="navbar-brand d-flex align-items-center fw-500" href="/"><img alt="logo" class="d-inline-block align-top mr-2" src="/assets/img/logo.png">Global connection</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('private') }}">Main <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')


<script src="/assets/js/vendors.bundle.js"></script>
<script src="/assets/js/app.bundle.js"></script>

</body>
</html>
