<div class="col-md-2">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="active"><a href="/">Profile</a></li>
        <li role="presentation" class=""><a href="/api">API</a></li>
    </ul>
</div>

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                @yield('user.title')
                @yield('api.title')
            </h3>
        </div>
        <div class="panel-body">

            {{-- show emails--}}
            <div class="container-fluid">
                @yield('user.main')
                @yield('api.main')
            </div>

        </div>
    </div>
</div>