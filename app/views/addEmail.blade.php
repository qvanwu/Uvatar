@extends('layouts.master')

@section('email.add')

    {{Form::open(array('route' => 'email.create', 'method' => 'get', 'class' => 'col-md-4 col-md-offset-4'))}}

        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', null, array('class' => 'form-control'))}}
        </div>
        {{Form::submit('Add email', array('class' => 'btn btn-primary'))}}
    {{Form::close()}}

    {{--show validator errors--}}
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $message)
                <li style="color:#ac2925;">{{$message}}</li>
            @endforeach
        </ul>
    @endif


@endsection

@stop