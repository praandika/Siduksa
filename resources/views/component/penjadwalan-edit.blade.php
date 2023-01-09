@section('title','Finishing')
@section('page-title','Finishing')
@push('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
<li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white"
        href="{{ route('penjadwalan.index') }}">Penjadwalan</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Finishing</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Finishind Data {{ $penjadwalan->id }} | {{ $penjadwalan->date_stock_in }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('penjadwalan.update', $penjadwalan->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="konversi_id" value="{{ $penjadwalan->konversi_id }}">
            <input type="hidden" name="mesin_id" value="{{ $penjadwalan->mesin_id }}">
            <input type="hidden" name="first_stock" value="{{ $penjadwalan->first_stock }}">
            <div class="card">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="javascript:;" class="d-block">
                        <img src="{{ asset('assets/img/icon-sampah.png') }}" class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <span
                        class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Penjadwalan</span>
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        {{ $penjadwalan->status }}
                    </a>
                    <p class="card-description mb-4">
                        @if($penjadwalan->status == 'finished')
                        Proses daur ulang sampah plastik sudah selesai. <br>
                        Berat awal : {{ $penjadwalan->first_stock }} Kg <br>
                        Hasil akhir : {{ $penjadwalan->last_stock }} Kg <br>
                        Recovery Factor: {{ $penjadwalan->konversi->recovery_factor }}%
                        @else
                        Daur ulang sampah plastik masih dalam proses <br>
                        Berat awal : {{ $penjadwalan->first_stock }} Kg
                        @endif
                    </p>
                    <div class="author align-items-center">
                        <img src="{{ $penjadwalan->mesin->status == 'online' ? asset('assets/img/robot-on.gif') : asset('assets/img/robot-off.png') }}"
                            alt="..." class="avatar shadow">
                        <div class="name ps-3">
                            <span>{{ $penjadwalan->mesin->name }}</span>
                            <div class="stats">
                                <small>{{ $penjadwalan->status == 'finished' ? $penjadwalan->date_stock_out : $penjadwalan->date_stock_in }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Hasil Akhir (Gram)</label>
                    <input class="form-control" type="text" name="last_stock" id="last_stock" placeholder="Masukkan berat hasil akhir..."
                        required>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-success"><i
                    class="fa fa-check"></i>&nbsp;&nbsp;Finishing</button>
        </form>
    </div>
</div>
