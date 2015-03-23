@extends('layouts.master')

    @section('body.main')

        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Avatars</a></li>
                <li role="presentation" class=""><a href="#">API</a></li>
                <li role="presentation" class=""><a href="#">Profile</a></li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Here your avatars</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="/userimage/preset.jpg" alt="Your main avatar" class="center-block" width="100" height="100"/>
                        </div>
                        <hr/>

                        {{-- upload field --}}
                        <div class="row">
                            <p>Select image below or <a href="#" id="uploadImage"><b>add a new one</b></a></p>

                            {{Form::open(Array('route'=>'avatar.store',
                                                'method'=>'post',
                                                'files'=>true,
                                                'enctype'=>'multipart/form-data'))}}

                            <div class="upload-field hidden">
                                <b id="fileName"></b>
                                {{Form::submit('Upload', array('class'=>'btn btn-sm btn-primary', 'id'=>'btnSubmit'))}}
                                <button id="btnCancel" class="btn btn-sm btn-danger" type="reset">Cancel</button>
                            </div>
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li style="color:#ac2925;">{{$message}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            {{Form::file('inputFile', array('id'=>'inputFile', 'class'=>'hidden'))}}
                            {{Form::close()}}
                        </div>


                        <div class="row">
                            @foreach(Auth::user()->avatars as $avatar)
                                {{HTML::image(
                                                url('userimage/'.Auth::user()->id.'/'.$avatar->filename.'?size=500'),
                                                '', # alt attribute
                                                array('class' => 'img-thumbnail thumb')
                                                )}}
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection

@stop