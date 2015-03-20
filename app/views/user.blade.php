@extends('layouts.master')

    @section('body.main')
        <div class="container-fluid">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="#">Avatars</a></li>
                    <li role="presentation" class=""><a href="#">API</a></li>
                    <li role="presentation" class=""><a href="#">Profile</a></li>
                </ul>

                {{--
                {{ Form::open(array(
                    'url'    => '/upload',
                    'method' => 'post',
                    'class'  => 'form-group',
                    'name'   => 'avatar',
                    'files'  => true)) }}


                    {{ Form::file('image', array('class' => 'btn btn-file')) }}
                    <br/>
                    {{ Form::submit('Upload', array('class'=>'btn btn-primary')) }}

                {{ Form::close() }}
                --}}
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Here your avatars</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <button class="btn btn-default btn-sm pull-right" type="submit">
                                    <span class="glyphicon glyphicon-plus oull-right"></span>
                                    Upload
                                </button>
                            </div>
                            <hr/>
                            <div class="row">

                            {{-- show all avatars here--}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endsection

@stop