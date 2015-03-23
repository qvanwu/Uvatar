@extends('layouts.master')

    @section('body.main')

        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Avatars</a></li>
                <li role="presentation" class=""><a href="#">API</a></li>
                <li role="presentation" class=""><a href="#">Profile</a></li>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Here your avatars</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            {{
                                HTML::image(
                                url('userimage/'.Auth::user()->id.'/'.Auth::user()->main_avatar),
                                '', # alt attribute
                                array('class' => 'center-block', 'width' => '150', 'height' => '150')
                                )
                            }}
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

                        <br/>


                        <div class="container-fluid">

                            @foreach(Auth::user()->avatars as $avatar)
                                <div class="col-xs-3 thumb">
                                    <div class="" href="#">
                                        {{
                                        HTML::image(
                                                url('userimage/'.Auth::user()->id.'/'.$avatar->filename.'?size=500'),
                                                '', # alt attribute
                                                array('class' => 'thumb')
                                        )
                                        }}

                                        {{-- Set image as main --}}
                                        {{Form::open(array('action' => array('AvatarsController@setMain', $avatar->id), 'method' => 'get'))}}
                                            {{Form::submit('Pick this', array('class' => 'btn btn-xs btn-primary image-buttons'))}}
                                        {{Form::close()}}

                                        {{-- Delete image --}}
                                        {{Form::open(array('route' => array('avatar.destroy', $avatar->id), 'method' => 'delete'))}}
                                            {{Form::submit('Remove', array('class' => 'btn btn-xs btn-danger image-buttons pull-right'))}}
                                        {{Form::close()}}
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection

@stop