@extends('adminlte::page')


@section('content')

    <div id="app">
        <user-component></user-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
