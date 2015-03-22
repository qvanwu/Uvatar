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
                                {{--
                                <button id="btnSubmit" class="btn btn-sm btn-primary" type="submit">Upload</button>
                                --}}
                                {{Form::submit('Upload', array('class'=>'btn btn-sm btn-primary', 'id'=>'btnSubmit'))}}
                                <button id="btnCancel" class="btn btn-sm btn-danger" type="reset">Cancel</button>
                            </div>
                            {{Form::file('inputFile', array('id'=>'inputFile', 'class'=>'hidden'))}}
                            {{Form::close()}}

                            {{--
                            <form id="formUpload" method="POST" action="/upload" enctype="multipart/form-data">
                                <div class="upload-field hidden">
                                    <b id="fileName"></b>
                                    <button id="btnSubmit" class="btn btn-sm btn-primary" type="submit">Upload</button>
                                    <button id="btnCancel" class="btn btn-sm btn-danger" type="reset">Cancel</button>
                                </div>
                                <input type="file" id="inputFile" name="inputFile" class="hidden"/>
                            </form>
                            --}}

                        </div>


                        <div class="row">

                        {{-- show all avatars here--}}

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection

@stop