@section('title','Penjadwalan')
@section('page-title','Penjadwalan')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Penjadwalan</li>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Penjadwalan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Awal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Akhir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery Factor</th>
                                <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin</th> -->
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Awal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Akhir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery Factor</th>
                                <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin</th> -->
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $o->first_stock }} Kg</p>
                                    <p class="text-xs text-secondary mb-0">{{ $o->date_stock_in }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $o->last_stock }} Kg</p>
                                    <p class="text-xs text-secondary mb-0">{{ $o->date_stock_out }}</p>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->recovery_factor }}%</span>
                                </td>
                                <!-- <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ $o->mesin_status == 'online' ? asset('assets/img/robot-on.gif') : asset('assets/img/robot-off.png') }}" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->mesin_name }}</h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <span class="badge badge-sm {{ $o->mesin_status == 'online' ? 'bg-gradient-success' : 'bg-gradient-secondary' }} ">{{ $o->mesin_status }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </td> -->
                                <td>
                                    <span class="text-xs font-weight-bold badge badge-sm {{ $o->status == 'finished' ? 'bg-gradient-primary' : 'bg-gradient-warning' }} ">{{ $o->status }}</span>
                                </td>
                                <td class="align-middle">
                                    @if($o->status == 'finished')
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Done">
                                        <i class="fa fa-minus" style="color: grey;"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('penjadwalan.edit', $o->id) }}" data-toggle="tooltip" data-placement="top" title="Finishing">
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
                                <!-- <td></td> -->
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
        $('#myTable').DataTable();
    } );
</script>
@endpush