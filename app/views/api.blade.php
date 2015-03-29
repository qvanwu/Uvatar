@extends('layouts.master')
@extends('layouts.menuPanel')

@section('api.main')
@section('api.title')
    API usage
@endsection

<h4><em>Your avatars could be generated simply by using your address.
Follow theses steps and use for your personal project.</em></h4>
<hr/>


<div class="row">
    <h5>1. We use a md5 hashed Email address to access your account.
        So first pleas enter your Email address here</h5>

    {{Form::open(array('action' => 'ApiController@generate', 'method' => 'get'))}}
    <input type="email" name="email" placeholder="john.smith@oula.com" class="form-control"/>
    <br/>
    {{Form::submit('Hash your Email', array('class' => 'btn btn-primary text-center'))}}
    {{Form::close()}}
    <label for="">Copy the result to use</label>
    <input type="text" value='{{Session::get("result")}}' disabled class="form-control"/>
</div>

@endsection

@stop
@stop