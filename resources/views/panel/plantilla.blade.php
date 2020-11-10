<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Marcelo Salar" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>DecandiaSoft</title>


    <link href="{{ asset('css/fullcalendar/main.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/panel/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c"> --}}

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/panel/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/vanilla-dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chartjs/Chart.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/panel/vanilla-dataTables.js') }}"></script>

    <script src="{{ asset('js/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chartjs/Chart.min.js') }}"></script>
    
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="{{ asset('js/fullcalendar/main.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">DecandiaSoft</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" style="display: none;">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Cerrar la sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Panel <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sucursal.index') }}">
                                <span data-feather="file"></span>
                                Sucursales (Adm.S)
                            </a>
                            <ul>
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('sucursal.index') }}">
                                        <span data-feather="bar-chart-2"></span>
                                        Listado (Adm.S)
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('salas.index') }}">
                                        <span data-feather="bar-chart-2"></span>
                                        Salas (Adm.S)
                                    </a>
                                </li>        
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('especialidad.index') }}">
                                <span data-feather="shopping-cart"></span>
                                Especialidades (Adm.S)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cobertura.index') }}">
                                <span data-feather="coberturas"></span>
                                Coberturas (Adm.S)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profesional.index') }}">
                                <span data-feather="layers"></span>
                                Profesionales (Adm)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paciente.index') }}">
                                <span data-feather="layers"></span>
                                Paciente (Rec)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('turnos.index') }}">
                                <span data-feather="layers"></span>
                                Turnos (Rec)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reportes.index') }}">
                                <span data-feather="layers"></span>
                                Reportes (Direc)
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="display: none !important;">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                @yield('cuerpo_panel')
                
            </main>
        </div>
    </div>
    {{-- <script src="{{ asset('js/panel/jquery-3.5.1.slim.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/panel/jquery.slim.min.js') }}"><\/script>');
    </script> --}}
    <script src="{{ asset('js/panel/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('js/panel/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/panel/feather.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/panel/dashboard.js') }}"></script> --}}
    
</body>
</html>