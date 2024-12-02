@extends('adminlte::page')


@section('content')

    <div id="app">
        <schedule-component></schedule-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
