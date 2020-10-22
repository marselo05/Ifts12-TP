<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clínicas - IFTS 12</title>

        <link rel="stylesheet" href="{{ asset('css/front/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/front/cover.css') }}">

        <link rel="stylesheet" href="{{ asset('css/plantilla_front.css') }}">

    </head>
    <body class="text-center" id="body">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">Clínicas - IFTS 12</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        {{-- <a class="nav-link active" href="#">Home</a> --}}
                        <a class="nav-link" href="{{ route('sucursales') }}">Sucursales</a>
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                        <a class="nav-link" href="{{ route('contactenos') }}">Contactenos</a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">Clinica.</h1>
                <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p class="lead">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Ingresar</a>
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Todos los de rechos resevados <a href="#">IFTS 12</a>, by <a href="#">@mdo</a>.</p>
                </div>
            </footer>
        </div>

        <div class="flex-center position-ref full-height" style="display: none;">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </body>
</html>
