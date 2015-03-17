@extends('layouts.master')

@section('body.login')
    <form class="col-md-6 col-md-offset-3" action="post" role="form">
        <h1>Welcome, please login</h1><br/>
        <label for="email">Email</label>
        <input class="form-control" type="email" id="email"/>
        <br>
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password"/>
        <br>
        <button class="btn btn-primary">Login</button>
    </form>
@endsection

@section('body.main')
    auth
@endsection

@stop