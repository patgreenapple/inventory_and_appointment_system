@extends('adminlte::page')


@section('content')

    <div id="app">
        <inquiry-component></inquiry-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
