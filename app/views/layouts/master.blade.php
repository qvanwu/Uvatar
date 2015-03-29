<!DOCTYPE html>
<html>
    <head>
        <title>Uvatar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}"/>
    </head>

    <body>
            
        <!-- navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Uvatar</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/api">API</a>
                        </li>
                        @if (Auth::check())
                            <li>
                                <p class="navbar-text">
                                    Hello {{ Auth::user()->getUserName() }}
                                </p>
                            </li>

                            <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span></a>
                            </li>
                        @else
                            <li><a href="/register">
                                    Sign up
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            @if (Auth::check())
                @yield('body.main')    {{--show if logged in--}}
                @yield('email.add')
            @else
                @yield('body.login')         {{--show login form--}}
            @endif

            @yield('body.register')
        </div>


        <script src="{{ URL::asset('assets/js/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    </body>
</html>