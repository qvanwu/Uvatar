@extends('layouts.master')

@section('body.login')
    {{Form::open(array('url'=>'login', 'method'=>'get', 'class'=>'col-md-4 col-md-offset-4'))}}
        <h1>Login here</h1><br/>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::email('email', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', array('class'=>'form-control'))}}
        </div>
    {{Form::submit('Login', array('class'=>'btn btn-primary'))}}

@endsection

@section('body.main')
    You are logged in
@endsection

@stop