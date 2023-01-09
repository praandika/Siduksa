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
            @include('component.user-create')
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

    @elseif(Route::is('sampah-plastik.*'))
        @if(Route::is('sampah-plastik.edit'))
            @include('component.sampah-plastik-edit')
        @else
            @include('component.sampah-plastik-create')
            @include('component.sampah-plastik-data')
        @endif

    @elseif(Route::is('sampah-cacah.*'))
        @if(Route::is('sampah-cacah.edit'))
            @include('component.sampah-cacah-edit')
        @else
            @include('component.sampah-cacah-create')
            @include('component.sampah-cacah-data')
        @endif

    @elseif(Route::is('konversi.*'))
        @if(Route::is('konversi.edit'))
            @include('component.konversi-edit')
        @else
            @include('component.konversi-create')
            @include('component.konversi-data')
        @endif

    @elseif(Route::is('penjadwalan.*'))
        @if(Route::is('penjadwalan.edit'))
            @include('component.penjadwalan-edit')
        @else
            @include('component.penjadwalan-create')
            @include('component.penjadwalan-data')
        @endif
    @endif
@endsection
