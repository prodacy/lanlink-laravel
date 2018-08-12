<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lanlink :: Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/laravel.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Lanlink :: Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} 
                                <!-- <span class="caret"></span> -->
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @auth
                    <ul class="nav nav-tabs nav-pills">
                        <li role="presentation" class="@if($current_route_name=='') active @endif">
                            <a href="{{url('painel')}}">Dashboard</a>
                        </li>
                        <li role="presentation" class="{{strpos($current_route_name,'departamentos')>-1 ? 'active' : ''}}">
                            <a href="{{url('painel/departamentos')}}">Departamentos</a>
                        </li>
                        <li role="presentation" class="{{strpos($current_route_name,'funcionarios')>-1 ? 'active' : ''}}">
                            <a href="{{url('painel/funcionarios')}}">Funcionários</a>
                        </li>
                        <li role="presentation" class="{{strpos($current_route_name,'movimentacoes')>-1 ? 'active' : ''}}">
                            <a href="{{url('painel/movimentacoes')}}">Movimentações</a>
                        </li>
                    </ul>
                    <br>
                    @endauth

                    @if( isset($errors) && count($errors) > 0 )
                    <!-- Mensagens de erros -->
                    <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                    @endif

                    @if( isset($msgs) && count($msgs) > 0 )
                    <!-- Mensagens públicas dos controllers -->
                    <div class="alert alert-success">
                        @foreach( $msgs as $msg )
                        <p>{{$msg}}</p>
                        @endforeach
                    </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </div>
    </main>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
