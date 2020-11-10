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
            <br>
            <main role="main" class="inner cover">
                <h3 class="cover-heading">Nuestra historia</h3>

                <p class="lead">
                    La clinica CURAR S.A se destaca por sus logros de vanguardia, por la fundación de la Escuela de Enfermería más antigua del país, y por la alianza con la Universidad de Buenos Aires y con la Universidad Católica Argentina que lo habilitan como Unidad Docente y Hospital Universitario, respectivamente.
                    <br>
                    Atiende cerca de 1 millón de pacientes al año; capacita de manera totalmente gratuita a generaciones de enfermeros; y forma decenas de profesionales médicos cada año. Cuenta con más de 2.500 profesionales de la salud y una Red de Atención propia con presencia en la Ciudad de Buenos Aires y el conurbano bonaerense.
                    <br>
                    Hoy, sienta las bases de sus próximos logros a través del cumplimiento de estrictos estándares internacionales, en calidad y seguridad al paciente; abordando el desafío de acreditar próximamente por la Joint Commission International, prestigiosa institución que audita el cumplimiento de estrictas normas y procedimientos.
                    <br>
                    De esta manera, mira el futuro y proyecta con firmeza sus próximos 175 años. 
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
