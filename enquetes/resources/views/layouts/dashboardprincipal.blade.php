<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Sistema de Enquetes CLF</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="white">
            <div class="logo">
                <a href="{{ action('HomeController@index') }}" class="simple-text logo-mini">
                    <img src="{{ asset('images/mob-logo.svg') }}" alt="Logo CLF" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('HomeController@index') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Pagina Inicial</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">
                            <i class="material-icons">person</i>
                            <p>Administração</p>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a class="nav-link" href="{{ action('TurmaController@index', 0) }}">
                                        <i class="material-icons">group</i>
                                        <p>Turmas</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('DisciplinasController@index', 0) }}">
                                        <i class="material-icons">school</i>
                                        <p>Disciplinas</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/avaliacao/administracao/vinculacoes') }}">
                                        <i class="material-icons">loop</i>
                                        <p>Vinculações</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('STTSEController@cadastroSTTSE') }}">
                                        <i class="material-icons">loop</i>
                                        <p>Adicionar Vinculação</p>
                                    </a>
                                </li>
                                @if(Auth::user()->tipoUser == "1" or Auth::user()->tipoUser == "3")
                                <li>
                                    <a class="nav-link" href="{{ action('SedesController@index', 0) }}">
                                        <i class="material-icons">location_city</i>
                                        <p>Sedes</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('TurnosController@index', 0) }}">
                                        <i class="material-icons">wb_sunny</i>
                                        <p>Turno</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('SeriesController@index', 0) }}">
                                        <i class="material-icons">filter_9_plus</i>
                                        <p>Series</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('EnsinoController@index', 0) }}">
                                        <i class="material-icons">book</i>
                                        <p>Ensino</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ action('HomeController@administracao') }}">
                                        <i class="material-icons">how_to_reg</i>
                                        <p>Usuários</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('HomeController@index') }}">
                            <i class="material-icons">group</i>
                            <p>Coordenadores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('HomeController@index') }}">
                            <i class="material-icons">school</i>
                            <p>Professores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('HomeController@index') }}">
                            <i class="material-icons">comment</i>
                            <p>Perguntas</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        @yield('titulo')
                    </div>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('HomeController@index') }}">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('botao')
                            <div class="card">
                                @yield('conteudo')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('js/plugins/sweetalert2.js') }}"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('js/material-dashboard.js?') }}" type="text/javascript"></script>

        <script>
        </script>
</body>

</html>
