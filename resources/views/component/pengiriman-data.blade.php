@section('title','Pengiriman')
@section('page-title','Pengiriman')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pengiriman</li>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Pengiriman</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengiriman</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Produksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah Cacah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengiriman</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Produksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah Cacah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
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
                                    <span class="text-xs font-weight-bold">{{ \Carbon\Carbon::parse($o->date)->format('j F Y') }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ \Carbon\Carbon::parse($o->production_date)->format('j F Y') }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/sparkling.gif') }}" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->sampahCacah->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->stock }} kg</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->mesin->name }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold badge badge-sm {{ $o->status == 'arrived' ? 'bg-gradient-primary' : 'bg-gradient-warning' }} ">{{ $o->status }}</span>
                                </td>
                                <td class="align-middle">
                                    @if($o->status == 'arrived')
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Ubah">
                                            <i class="fas fa-edit" style="color: grey;"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('pengiriman.edit', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Ubah">
                                            <i class="fas fa-edit" style="color: DodgerBlue;"></i>
                                        </a>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if($o->status == 'arrived')
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Done">
                                            <i class="fa fa-minus" style="color: grey;"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('pengiriman.done', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Terkirim">
                                            <i class="fas fa-check" style="color: forestgreen;"></i>
                                        </a>
                                    @endif
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