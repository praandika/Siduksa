@section('title','Laporan')
@section('page-title','Laporan')
@push('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Laporan {{ $title }}</li>
@endpush
<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <div class="row">
            <h6>Export Laporan {{ $title }}</h6>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('export',$param) }}">
            @csrf()
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Awal</label>
                        <input class="form-control" type="date" name="start" value="{{ old('start') }}"
                            required autofocus>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Akhir</label>
                        <input class="form-control" type="date" name="end" value="{{ old('end') }}"
                            required autofocus>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn bg-gradient-secondary"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export</button>
                </div>
            </div>
            
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Laporan {{ $title }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        @if($title == 'Penjualan')
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total
                                </th>
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
                                    <span class="text-xs font-weight-bold"><a
                                            href="{{ url('penjualan-transaction/'.$o->invoice.'') }}"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Detail">{{ $o->invoice }}</a></span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/icon-supplier.png') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->supplier->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->supplier->instansi }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">Rp
                                        {{ number_format($o->total, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>#</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                        @elseif($title == 'Pembelian')
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengepul
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengepul
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total
                                </th>
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
                                    <span class="text-xs font-weight-bold"><a
                                            href="{{ url('pembelian-transaction/'.$o->invoice.'') }}"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Detail">{{ $o->invoice }}</a></span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/icon-pengepul.png') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->pengepul->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->pengepul->instansi }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">Rp
                                        {{ number_format($o->total, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>#</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                        @else
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                                    Masuk</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok
                                    Awal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                                    Keluar</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hasil
                                    Akhir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery
                                    Factor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mesin
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                                    Masuk</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok
                                    Awal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                                    Keluar</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hasil
                                    Akhir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery
                                    Factor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/robot-on.gif') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->mesin->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->mesin->capacity }} Kg</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->date_stock_in }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->first_stock }} Kg</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->date_stock_out }}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->last_stock }} Kg</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->recovery_factor }}%</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ ucwords($o->status) }}</span>
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
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@push('after-script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
@endpush
