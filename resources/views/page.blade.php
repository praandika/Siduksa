@extends('layouts.main')

@section('content')
    @if(Route::is('dashboard'))
        @section('title','Dashboard')
        @section('page-title','Dashboard')

        @section('breadcrumb','Dashboard')
        
    @endif
@endsection
