@extends('adminlte::page')


@section('content')

    <div id="app">
        <payment-method-component></payment-method-component>
    </div>


@stop


@section('js')

    <script src="{{ asset('js/app.js') }}"></script>
  
@stop
