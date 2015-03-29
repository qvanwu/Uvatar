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
        So first pleas enter your Email address here:</h5>

    {{Form::open(array('action' => 'ApiController@generate', 'method' => 'get'))}}
    <input type="email" name="email" placeholder="john.smith@oula.com" class="form-control"/>
    <br/>

    <h5>2. (Optional) Set image size: (pixel)</h5>

    <div class="col-md-2">
        <input type="text" name="size" placeholder="250" size="5" class="form-control" value=""/>
    </div>
    <br/><br/>

    <h5>3. (Optional) Choose your preferred output format:</h5>

    <label class="radio-inline"><input type="radio" name="format" value="jpg">jpeg</label>
    <label class="radio-inline"><input type="radio" name="format" value="png">png</label>
    <label class="radio-inline"><input type="radio" name="format" value="bmp">bmp</label>
    <br/><br/><br/>

    {{Form::submit('See result', array('class' => 'btn btn-primary text-center'))}}
    {{Form::close()}}
    <label for="">Copy the result to use</label>
    <input type="text" value='{{Session::get("result")}}' readonly class="form-control"/>
    <h4>{{Session::get('message')}}</h4>
</div>

@endsection

@stop
@stop