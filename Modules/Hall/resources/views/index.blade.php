@extends('hall::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('hall.name') !!}</p>
@endsection
