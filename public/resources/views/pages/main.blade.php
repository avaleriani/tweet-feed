@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.errors')
        @yield('input')
    </div>


@stop
