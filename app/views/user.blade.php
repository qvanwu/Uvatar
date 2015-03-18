@extends('layouts.master')

    @section('body.main')
        <h1>Hi, {{ Auth::user()->getUserName() }}!</h1>
        <div class="container-fluid">
            <div class="col-md-9">
                <h3>Here your avatars</h3>
                {{-- show all avatars --}}
            </div>
            <div class="col-md-3">
                <h3>Upload a new file</h3>
                {{ Form::open(array(
                    'url'    => '/upload',
                    'method' => 'post',
                    'class'  => 'form-group',
                    'name'   => 'avatar',
                    'files'  => true)) }}
                    
                    
                    {{ Form::file('image', array('class' => 'btn btn-file')) }}</br>
                    {{ Form::submit('Upload', array('class'=>'btn btn-primary')) }}
        
                {{ Form::close() }}
            </div>
        </div>
    @endsection

@stop