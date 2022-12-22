
@section('title','Edit Sampah Plastik')
@section('page-title','Edit Sampah Plastik')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('sampah-plastik.index') }}">Sampah Plastik</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Sampah Plastik</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $sampahPlastik->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('sampah-plastik.update', $sampahPlastik->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Sampah Plastik Information</p>
            <div class="row">
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Sampah</label>
                        <input class="form-control" type="text" name="name" value="{{ $sampahPlastik->name }}" placeholder="Masukkan nama sampah plastik..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Kg)</label>
                        <input class="form-control" type="text" name="price_kg" value="{{ $sampahPlastik->price_kg }}" placeholder="Masukkan harga kg sampah plastik..." required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Gram)</label>
                        <input class="form-control" type="text" name="price_gram" value="{{ $sampahPlastik->price_gram }}" placeholder="Masukkan harga gram sampah plastik...">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Pcs)</label>
                        <input class="form-control" type="text" name="price_pcs" value="{{ $sampahPlastik->price_pcs }}" placeholder="Masukkan harga pcs sampah plastik...">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
