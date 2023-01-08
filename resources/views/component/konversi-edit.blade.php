
@section('title','Edit Konversi')
@section('page-title','Edit Konversi')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('konversi.index') }}">Konversi</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Konversi</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $konversi->id }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('konversi.update', $konversi->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Konversi Information</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pilih Sampah</label>
                        <input class="form-control" type="text" name="sampah" id="sampah" value="{{ $konversi->sampahPlastik->name }}"
                            placeholder="Pilih sampah plastik..." data-bs-toggle="modal" data-bs-target="#sampahPlastik"
                            required autofocus readonly>
                        <input type="hidden" name="sampah_plastik" id="sampah_id" value="{{ $konversi->sampahPlastik->sampah_plastik_id }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok (Gram)</label>
                        <input class="form-control" type="text" name="stok" id="stok" value="{{ $konversi->sampahPlastik->stock * 1000 }}"
                            placeholder="Stok sampah plastik..." readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Berat (Gram)</label>
                        <input class="form-control" type="text" name="total_weight" value="{{ $konversi->total_weight * 1000 }}"
                            placeholder="Masukkan total berat sampah plastik...">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
