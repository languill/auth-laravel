<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User management system</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Social network Global Connection</h1>
                @guest
                    <p><a class="btn btn-info" href="{{ route('login') }}">Login</a></p>
                    <p><a class="btn btn-warning"  href="{{ route('registration') }}">Registration</a></p>
                @endguest

                @auth
                    <p><a class="btn btn-info"  href="{{ route('private') }}">User's Area</a></p>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
