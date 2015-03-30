@extends('layouts.master')

@section('body.main')
    @extends('layouts.menuPanel')

@section('user.main')
@section('user.title')
    Here your account
@endsection

Here your emails or <a href="email/add"><b>add a new address</b></a>
<br/>
<br/>

<ul class="list-group">
    @foreach(Auth::user()->emails as $email)
        <a href="#">
            <li id="{{$email->id}}" class="list-group-item row">
                <div class="col-md-5">
                    <div class="col-md-8">
                        <h4>{{$email->email}}</h4>
                    </div>
                    @if (!is_null($email->main_avatar))
                        <div class="thumbnail small-thumb col-md-3">
                            {{HTML::image(url('userimage/'.Auth::user()->id.'/'.$email->main_avatar))}}
                        </div>
                    @endif

                    @if($email != Auth::user()->emails->first())
                    <div class="col-md-6">
                            {{Form::open(array('route' => array('email.destroy', $email->id),
                                                'method' => 'delete',
                                                'onsubmit' => 'return confirm("You really want to delete this item?")'))}}
                            {{Form::submit('Delete address', array('class' => 'btn-hidden'))}}
                            {{Form::close()}}
                    </div>
                    @endif

                    @if (!is_null($email->main_avatar))
                        <div class="col-md-6">
                            {{Form::open(array('action' => array('EmailsController@remove', $email->id),
                                                'method' => 'get',
                                                'onsubmit' => 'return confirm("You really want to delete this item?")'))}}
                            {{Form::submit('Remove avatar', array('class' => 'btn-hidden'))}}
                            {{Form::close()}}
                        </div>
                    @endif
                </div>
            </li>
        </a>
    @endforeach
</ul>
</div>
<hr/>

<div class="container-fluid">

    {{-- show all images --}}
    <p>Select a avatar below or <a href="#" id="uploadImage"><b>upload a new image</b></a></p>

    <div class="row">

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

    {{-- show all avatars --}}
    <div class="row">
        @foreach(Auth::user()->avatars as $avatar)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <a href="/avatar/{{$avatar->id}}">
                        {{
                        HTML::image(
                                url('userimage/'.Auth::user()->id.'/'.$avatar->filename),
                                '', # alt attribute
                                array('class' => 'thumb', 'id' => substr($avatar->filename, 0, 5))
                        )
                        }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
@stop
@endsection

@stop