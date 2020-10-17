<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" class="main-wrapper">
            <div class="navigation">
                <div class="col-md-12 ham-brand-holder">
                    <button class="hamburger hamburger--elastic" type="button">
                              <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                              </span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo" src="{{asset('imgs/dr-house.png')}}" alt="{{ config('app.name', 'Marca') }}">
                    </a>
                </div>
                @include('includes.nav')
            </div>
        <div class="content-page">
            <div class="navbar-custom">
                <ul class="nav navbar-nav navbar-right user-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <img class="avatar" src="{{ asset('imgs/iconfinder_10_avatar_2754575.png') }}" alt=""/>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li><a href="{{ url('/users/listar') }}">Gerenciar usuários</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.delete-modal')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
