@extends('adminlte::page')


@section('content')

    <div id="app">
        <item-category-component></item-category-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
