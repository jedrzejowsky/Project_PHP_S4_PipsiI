<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}" />
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">

                            <p class="h1 fw-bold mb-3 mx-1 mx-md-4 mt-4 error-code">@yield('code')</p>

                            <p class="h1 fw-bold mb-3 mx-1 mx-md-4">
                                @yield('message')
                                <i class="bi bi-emoji-frown"></i>
                            </p>

                                <div class="mx-4 mb-3 mb-lg-4">
                                    <a href=" {{ route('home') }}">
                                        <button class="button btn btn-secondary btn-md">Go back home</button>
                                    </a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
