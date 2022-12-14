@extends('layouts.main')

@section('content')
    @if(Route::is('dashboard'))
        @section('title','Dashboard')
        @section('page-title','Dashboard')
        @section('breadcrumb','Dashboard')
        
    @elseif(Route::is('supplier.*'))
        @if(Route::is('supplier.show'))
            @include('component.supplier-show')
        @elseif(Route::is('supplier.edit'))
            @include('component.supplier-edit')
        @else(Route::is('supplier.edit'))
            
            @include('component.supplier-data')
        @endif
    @endif
@endsection
