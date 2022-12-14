@extends('layouts.main')

@section('content')
    @if(Route::is('dashboard'))
        @section('title','Dashboard')
        @section('page-title','Dashboard')
        @push('breadcrumb')
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        @endpush

    @elseif(Route::is('user.*'))
        @if(Route::is('user.edit'))
            @include('component.user-edit')
        @else
            @include('component.user-data')
        @endif
        
    @elseif(Route::is('supplier.*'))
        @if(Route::is('supplier.edit'))
            @include('component.supplier-edit')
        @else
            @include('component.supplier-create')
            @include('component.supplier-data')
        @endif

    @elseif(Route::is('pengepul.*'))
        @if(Route::is('pengepul.edit'))
            @include('component.pengepul-edit')
        @else'
            @include('component.pengepul-create')
            @include('component.pengepul-data')
        @endif

    @elseif(Route::is('mesin.*'))
        @if(Route::is('mesin.edit'))
            @include('component.mesin-edit')
        @else
            @include('component.mesin-create')
            @include('component.mesin-data')
        @endif
    @endif
@endsection
