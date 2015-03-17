<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"/>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Gravatar</a>
                </div>
                <button type="button" class="btn btn-default pull-right">Sign up</button>
            </div>
        </nav>

    @yield('body.content')

    </body>
</html>