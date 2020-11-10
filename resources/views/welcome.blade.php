<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DecandiaSoft</title>

        <link rel="stylesheet" href="{{ asset('css/front/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/front/cover.css') }}">

        <link rel="stylesheet" href="{{ asset('css/plantilla_front.css') }}">

    </head>
    <body class="text-center" id="body">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <a href="{{ route('home') }}">
                        <h3 class="masthead-brand">Curar S.A</h3>
                    </a>
                    <nav class="nav nav-masthead justify-content-center">
                        {{-- <a class="nav-link active" href="#">Home</a> --}}
                        <a class="nav-link" href="{{ route('sucursales') }}">Sucursales</a>
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">Curar S.A</h1>
                <p class="lead">
                    Bienvenido al Portal Web de Curar S.A
                </p>
                <p class="lead"> Estimado Paciente </p>
                <p class="lead"> A través del registro de un usuario en nuestro Portal Web usted podrá: </p>
                <p class="lead">
                    - Solicitar turnos online
                    <br>
                    - Recuerde que las reservas de turnos online se encuentran disponibles sólo para aquellos pacientes que se hayan atendido     previamente en el Curar S.A. Si Ud. aún no ha concurrido a la clinica comuníquese con nuestra Central Telefónica de  Turnos, <br>al 0810-222- CURAR (22748).
                </p>
                <p class="lead">
                    Muchas gracias.
                    Curar S.A
                </p>
                <p class="lead">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Ingresar</a>
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Todos los derechos reservados <a href="#">DecandiaSoft</a>, by <a href="#">IFTS@Grupo5</a>.</p>
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
