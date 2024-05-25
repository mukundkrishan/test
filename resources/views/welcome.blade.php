<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
       
    </head>
    <body>
        <div class="container">
            <h1> WELCOME </h1>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4 col-md-6 col-sm-8">
                <a href="{{ route('login') }}" class="w-100 btn btn-lg btn-success" type="button">Click to Sign in</a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <a href="{{ route('register') }}" class="w-100 btn btn-lg btn-secondary" type="button">Click to Register</a>
                </div>
            </div>
    </body>
</html>
