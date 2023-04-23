@extends('layouts.main')

@section('content')
    @if(Route::is('dashboard'))
        @section('title','Dashboard')
        @section('page-title','Dashboard')
        @push('breadcrumb')
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        @endpush

        <div class="row">
            <livewire:info-sampah-cacah/>
            <livewire:info-sampah-plastik/>
            <livewire:info-penjualan/>
            <livewire:info-pembelian/>
        </div>

        <div class="row mt-4">
            <livewire:chart-penjualan/>
        </div>

        <div class="row mt-4">
            <livewire:top-sales/>
            <livewire:stok-sampah/>
            <livewire:stok-cacah/>
        </div>

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

    @elseif(Route::is('pembelian.*'))
        @if(Route::is('pembelian.index'))
            @include('component.pembelian-data')
        @else
            @include('component.pembelian-transaksi')
        @endif

    @elseif(Route::is('penjualan.*'))
        @if(Route::is('penjualan.index'))
            @include('component.penjualan-data')
        @else
            @include('component.penjualan-transaksi')
        @endif

    @elseif(Route::is('pemilahan.*'))
        @if(Route::is('pemilahan.edit'))
            @include('component.pemilahan-edit')
        @else
            @include('component.pemilahan-data')
        @endif

    @elseif(Route::is('pengiriman.*'))
        @if(Route::is('pengiriman.edit'))
            @include('component.pengiriman-edit')
        @else
            @include('component.pengiriman-create')
            @include('component.pengiriman-data')
        @endif

    @elseif(Route::is('report'))
        @include('component.laporan')

    @elseif(Route::is('labarugi'))
        @include('component.laporan')
    @endif
@endsection
