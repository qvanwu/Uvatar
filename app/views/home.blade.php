@extends('layouts.master')

    @section('body.login')
        {{Form::open(array('url'=>'login', 'method'=>'post', 'class'=>'col-md-4 col-md-offset-4'))}}
            <h1 class="text-center">Sign in here</h1><br/>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::email('email', null, array('class'=>'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('password', 'Password')}}
                {{Form::password('password', array('class'=>'form-control'))}}
            </div>
        {{Form::submit('Login', array('class'=>'btn btn-primary'))}}
        
        {{--show validator errors--}}

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                    <li style="color:#ac2925;">{{$message}}</li>
                @endforeach
            </ul>
            </div>
        @endif
    @endsection
    
@stop