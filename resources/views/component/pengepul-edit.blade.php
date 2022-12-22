
@section('title','Edit Pengepul')
@section('page-title','Edit Pengepul')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('pengepul.index') }}">Pengepul</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Pengepul</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $pengepul->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pengepul.update', $pengepul->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Pengepul Information</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $pengepul->name }}" required autofocus>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Alamat</label>
                        <input class="form-control" type="text" name="address" value="{{ $pengepul->address }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Instansi</label>
                        <input class="form-control" type="text" name="instansi" value="{{ $pengepul->instansi }}">
                    </div>
                </div>
            </div>

            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Whatsapp / No. Telp</label>
                        <input class="form-control" type="text" name="contact" value="{{ $pengepul->contact }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $pengepul->email }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
