@section('title','Edit User')
@section('page-title','Edit User')
@push('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
<li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white"
        href="{{ route('user.index') }}">User</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit User</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Edit Data {{ $user->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                            placeholder="Masukkan nama pegawai..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Alamat</label>
                        <input class="form-control" type="text" name="address" value="{{ $user->address }}"
                            placeholder="Masukkan alamat pegawai..." required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Whatsapp / Telp</label>
                        <input class="form-control" type="number" name="phone" value="{{ $user->phone }}"
                            placeholder="Masukkan kontak pegawai..." required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $user->email }}"
                            placeholder="Masukkan email pegawai...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Posisi</label>
                        <input class="form-control" type="text" name="position" value="{{ $user->position }}"
                            placeholder="Masukkan posisi / jabatan pegawai..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="rolesInput">Hak Akses</label>
                        <select class="form-control" id="rolesInput" name="roles" required>
                            <option value="{{ $user->roles }}">{{ ucwords($user->roles) }}</option>
                            <option>==================================</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan">Pimpinan</option>
                            <option value="gudang">Gudang</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Username</label>
                        <input class="form-control" type="text" name="username" value="{{ $user->username }}"
                            placeholder="Masukkan username..." required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>
