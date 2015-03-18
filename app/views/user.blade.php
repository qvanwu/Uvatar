@extends('layouts.master')
@section('body.main')
    <h1 class="text-center">Hi, {{Auth::user()->getUserName()}}</h1>
@endsection
@stop