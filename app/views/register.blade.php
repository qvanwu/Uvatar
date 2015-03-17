@extends('layouts.master')

@section('body.login')
    {{Form::open(array('route'=>'user.store', 'method'=>'post', 'class'=>'col-md-4 col-md-offset-4'))}}
    <div class="form-group">
        {{Form::label('username', 'Username')}}
        {{Form::text('username', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email', null, array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password')}}<br/>
        {{Form::password('password', null, array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password-again', 'Password again')}}<br/>
        {{Form::password('password-again', null, array('class'=>'form-control'))}}
    </div>
        {{Form::submit('Register', array('class'=>'btn btn-primary'))}}

    {{Form::close()}}
@endsection

@stop