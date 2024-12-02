@extends('adminlte::page')


@section('content')

    <div id="app">
        <item-component></item-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
