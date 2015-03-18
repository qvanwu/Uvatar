@extends('layouts.master')

@section('body.register')
    {{Form::open(array('route'=>'user.store', 'method'=>'post', 'class'=>'col-md-4 col-md-offset-4'))}}
    <h1>Register here</h1><br/>

    <div class="form-group">
        {{Form::label('username', 'Username')}}
        {{Form::text('username', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::email('email', null, array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password')}}
        {{Form::password('password', array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password_confirmation', 'Password confirm')}}
        {{Form::password('password_confirmation', array('class'=>'form-control'))}}
    </div>
        {{Form::submit('Register', array('class'=>'btn btn-primary'))}}

    <br/>

    {{--show validator errors--}}
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $message)
                <li style="color:#ac2925;">{{$message}}</li>
            @endforeach
        </ul>
    @endif

    {{Form::close()}}


@endsection

@stop