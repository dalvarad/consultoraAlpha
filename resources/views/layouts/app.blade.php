<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Consultora Alpha</title>
    <link rel="stylesheet" href="{{asset ('estilos/bootstrap/css/bootstrap.css')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- DatetimePicker -->
    <link rel="stylesheet" href="{{asset ('datetimepicker/jquery.datetimepicker.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            background-color: #F2F2F2;
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" style="font-family: Helvetica Neue, Helvetica, Arial; background-color: #FFFFFF;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->

                <a class="navbar-brand" href="{{ url('/') }}" style="color: #000000;">
                    Consultora Alpha
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                @if (Auth::check())  
                    <li><a href="{{ url('/home') }}" style="color: #000000;">Inicio</a></li>
                    <li><a href="{{ url('admin/empleado')}}" style="color: #000000;">Empleados</a></li>
                    <li><a href="{{ url('admin/ebic')}}" style="color: #000000;">Capacitaciones</a></li>
                    <li><a href="{{ url('admin/pago')}}" style="color: #000000;">Pagos</a></li>
                    <li><a href="{{ url('admin/institucion')}}" style="color: #000000;">Instituciones</a></li>
                    <li><a href="{{ url('/capacitaciones')}}" style="color: #000000;">Tipos de Capacitaciones</a></li>
                    
                    <li class="dropdown">
                        <a href="#" class="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span></span> Becas
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                 <a href="{{url('/beca')}}" style="color: #000000;">Becas</a>
                             @if(Auth::user()->id_user_type ==1)
                                <a href="{{url('/tipobeca')}}" style="color: #000000;">Tipos de Becas</a>
                                @endif         
                            </li>
                        </ul>
                    </li>
                @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" style="color: #000000;">Entrar</a></li>
                        <li><a href="{{ url('/register') }}" style="color: #000000;">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}" style="color: #000000;"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('template.partials.flash')
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>-->
    <script src="{{asset ('estilos/plugin/jquery-3.2.1.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- Scripts DATETIMEPICKER -->
    <script src="{{asset ('datetimepicker/jquery.js')}}"></script>
    <script src="{{asset ('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>

    <!-- Segmento para agregar funcionalidad javascript -->
    @yield('js')
</body>
</html>
