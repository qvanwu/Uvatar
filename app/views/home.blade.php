@extends('layouts.master')

@section('body.content')
    echo Form::email($name, $value = null, $attributes = array());
@endsection