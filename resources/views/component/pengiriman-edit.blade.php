
@section('title','Edit Pengiriman')
@section('page-title','Edit Pengiriman')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('pengiriman.index') }}">Pengiriman</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Pengiriman</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $pengiriman->invoice }} {{ $pengiriman->mesin->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pengiriman.update', $pengiriman->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Pengiriman Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Pengiriman</label>
                        <input class="form-control" type="date" name="date" value="{{ $pengiriman->date }}" placeholder="Masukkan tanggal pengiriman..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Produksi</label>
                        <input class="form-control" type="date" name="production_date" value="{{ $pengiriman->production_date }}" placeholder="Masukkan tanggal pengiriman..." required autofocus>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Ubah</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
