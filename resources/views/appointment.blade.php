@extends('adminlte::page')


@section('content')

    <div id="app">
        <appointment-component></appointment-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
