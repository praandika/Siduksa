@section('title','Sampah Cacah')
@section('page-title','Sampah Cacah')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Sampah Cacah</li>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Sampah Cacah</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (kg)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (gram)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (pcs)</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (kg)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (gram)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (pcs)</th>
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
                                            <img src="{{ asset('assets/img/sparkling.gif') }}" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->stock }} kg</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ number_format($o->price_kg, 0, ',', '.')}}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ number_format($o->price_gram, 0, ',', '.')}}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ number_format($o->price_pcs, 0, ',', '.')}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('sampah-cacah.edit', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="fas fa-edit" style="color: DodgerBlue;"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>#</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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