
@section('title','Edit User')
@section('page-title','Edit User')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('user.index') }}">User</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit User</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $User->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('User.update', $User->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Masukkan nama user..." required autofocus>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kapasitas (Kg)</label>
                        <input class="form-control" type="number" name="capacity" value="{{ $mesin->capacity }}" placeholder="Masukkan kapasitas (Kg), Cth: 10" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
