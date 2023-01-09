
@section('title','Edit Sampah Cacah')
@section('page-title','Edit Sampah Cacah')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('sampah-cacah.index') }}">Sampah Cacah</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Sampah Cacah</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $sampahCacah->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('sampah-cacah.update', $sampahCacah->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Sampah Cacah Information</p>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Sampah</label>
                        <input class="form-control" type="text" name="name" value="{{ $sampahCacah->name }}" placeholder="Masukkan nama sampah cacah..." required autofocus>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Kg)</label>
                        <input class="form-control" type="text" name="price_kg" value="{{ $sampahCacah->price_kg }}" placeholder="Masukkan harga kg sampah cacah..." required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Gram)</label>
                        <input class="form-control" type="text" name="price_gram" value="{{ $sampahCacah->price_gram }}" placeholder="Masukkan harga gram sampah cacah...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Pcs)</label>
                        <input class="form-control" type="text" name="price_pcs" value="{{ $sampahCacah->price_pcs }}" placeholder="Masukkan harga pcs sampah cacah...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok Tersedia</label>
                        <input class="form-control" type="text" value="{{ $stockAvailable }} Gram" placeholder="Stok tersedia..." readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Masukkan Stok (Gram)</label>
                        <input class="form-control" type="text" name="stock" value="{{ $sampahCacah->stock * 1000 }}" placeholder="Masukkan stok sampah cacah...">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
