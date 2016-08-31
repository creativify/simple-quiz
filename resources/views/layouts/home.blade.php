<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Simple Quiz</title>
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/quiz.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>
    <body>
        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Simple Quiz</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="/categories/" class="dropdown-toggle"
                               data-toggle="dropdown">Categories <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        @yield('content')
        <script src="/js/app.js"></script>
        <?php //if ($session->get('num') === 0 ): ?>
        <script type="text/javascript" src="/res/js/start.js"></script>
        <?php //endif; ?>
        <?php //if (! $session->get('last')) : ?>
        <script type="text/javascript" src="/res/js/form.js"></script>
        <?php //endif; ?>
    </body>
</html>

