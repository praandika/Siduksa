@section('title','Supplier')
@section('page-title','Supplier')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Supplier</li>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Supplier</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
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
                                            <img src="{{ asset('assets/img/icon-supplier.png') }}" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->instansi }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->address }}</span>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $o->contact }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $o->email }}</p>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('supplier.edit', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="fas fa-edit" style="color: DodgerBlue;"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('supplier.delete', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return tanya('Yakin hapus supplier {{ $o->name }}?')">
                                        <i class="fas fa-trash-alt" style="color: Crimson;"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">
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



@push('after-script')
<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>
@endpush