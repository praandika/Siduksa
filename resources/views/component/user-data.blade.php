@section('title','User')
@section('page-title','User')
@push('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">User</li>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data User</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Access
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Access
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/icon-user.gif') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->username }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $o->phone }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $o->email }}</p>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->address }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->position }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->roles }}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('user.edit', $o->id) }}" data-toggle="tooltip"
                                        data-placement="top" title="Ubah">
                                        <i class="fas fa-edit" style="color: DodgerBlue;"></i>
                                    </a>
                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a type="button" data-toggle="tooltip"
                                        data-placement="top" title="Ubah Password" data-bs-toggle="modal" data-bs-target="#changePasswordUser{{ $o->id }}">
                                        <i class="fas fa-lock" style="color: teal;"></i>
                                    </a> -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">
                                    <span class="text-xs font-weight-bold">No data available</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
@foreach($data as $o)
<div class="modal fade" id="changePasswordUser{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="changePasswordUserLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordUserLabel">Ganti Password {{ $o->username }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.change-password', $o->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password Lama</label>
                                <input class="form-control" type="password" name="oldpassword" value="{{ old('oldpassword') }}"
                                    placeholder="Masukkan password lama..." required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password Baru</label>
                                <input class="form-control" type="password" name="password" value="{{ old('password') }}"
                                    placeholder="Masukkan password baru..." required>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@push('after-script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
@endpush
