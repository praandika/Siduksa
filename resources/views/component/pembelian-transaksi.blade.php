@section('title','Transaksi Pembelian')
@section('page-title','Transaksi Pembelian')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi Pembelian</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-12">
                <h6>Pembelian</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('pembelian.store') }}" method="post">
            @csrf
            <p class="text-uppercase text-sm">{{ $invoice }}</p>
            <input type="hidden" name="invoice" value="{{ $invoice }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal</label>
                        <input class="form-control" type="text" name="date" value="{{ $now }}" placeholder="Masukkan tanggal..." required autofocus>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pengepul</label>
                        <input type="hidden" value="{{ old('pengepul_id') }}" id="pengepul_id">
                        <input class="form-control" type="text" name="pengepul_name" value="{{ old('pengepul_name') }}" id="pengepul_name" placeholder="Pilih pengepul" data-bs-toggle="modal" data-bs-target="#pengepulData" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sampah Plastik</label>
                        <input type="hidden" value="{{ old('sampah_id') }}" id="sampah_id">
                        <input class="form-control" id="sampah_name" type="text" name="sampah_name" value="{{ old('sampah_name') }}" placeholder="Pilih sampah" data-bs-toggle="modal" data-bs-target="#sampahData" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok</label>
                        <input class="form-control" type="hidden" id="stok" name="stock" value="{{ old('stock') }}" required>
                        <br>
                        <span style="font-size: 15px;" id="displayStok"></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga / Kg</label>
                        <input type="hidden" name="hargakg" id="hargakg" required>
                        <br>
                        <span style="font-size: 15px;" id="displayHargaKg"></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga / Gram</label>
                        <input type="hidden" name="hargag" id="hargag" required>
                        <br>
                        <span style="font-size: 15px;" id="displayHargaG"></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Qty</label>
                        <input class="form-control" type="number" name="stock" value="{{ old('stock') }}" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Buy</button>
            <a href="#" type="button" class="btn bg-gradient-success"><i class="fas fa-print"></i>&nbsp;&nbsp;Print Invoice</a>
        </form>
    </div>
</div>

<!-- TABEL DATA -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Detail Transaksi Pembelian</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @if($data == 'empty')
                                <tr>
                                    <td>#</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td></td>
                                </tr>
                            @else
                                @forelse($data as $o)
                                <tr>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/icon-sampah.png') }}" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $o->qty }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $o->satuan }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $o->harga }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('transaksi-pembelian.delete', $o->id_transaksi) }}" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="fas fa-trash" style="color: Crimson;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" style="text-align: center;">
                                        <span class="text-xs font-weight-bold">No data available</span>
                                    </td>
                                </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pengepul Modal -->
<div style="z-index: 9999;" class="modal fade" id="pengepulData" tabindex="-1" role="dialog" aria-labelledby="pengepulDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pengepulDataLabel">Pilih Pengepul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTablePengepul">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($pengepul as $o)
                            <tr data-id="{{ $o->id }}" data-name="{{ $o->name }}" class="pilihPengepul">
                            <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/icon-pengepul.png') }}" class="avatar avatar-sm me-3"
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sampah Plastik Modal -->
<div style="z-index: 9999;" class="modal fade" id="sampahData" tabindex="-1" role="dialog" aria-labelledby="sampahDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sampahDataLabel">Pilih Sampah Plastik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (kg)
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (gram)
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (pcs)
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (kg)
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (gram)
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (pcs)
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($sampah as $o)
                            <tr 
                            data-id="{{ $o->id }}"
                            data-name="{{ $o->name }}"
                            data-stok="{{ $o->stock * 1000 }}"
                            data-hargakg="{{ $o->price_kg }}"
                            data-hargakg="{{ $o->price_gram }}"
                            data-displaykg="Rp {{ number_format($o->price_kg, 0, ',', '.') }} /Kg"
                            data-displayg="Rp {{ number_format($o->price_gram, 0, ',', '.') }} /Gram"
                            data-displaystok="{{ number_format($o->stock * 1000, 0, ',', '.') }} Gram" class="pilihSampah">
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/icon-sampah.png') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->stock * 1000 }} Gram</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $o->type }}</p>
                                    @if ($o->type == 'PETE')
                                    <p class="text-xs text-secondary mb-0">Polyethylene Terephthalate</p>
                                    @elseif ($o->type == 'HDPE')
                                    <p class="text-xs text-secondary mb-0">High Density Polyethylene</p>
                                    @elseif ($o->type == 'PVC')
                                    <p class="text-xs text-secondary mb-0">Polyvinyl Chloride</p>
                                    @elseif ($o->type == 'LDPE')
                                    <p class="text-xs text-secondary mb-0">Low Density Polyethylene</p>
                                    @elseif ($o->type == 'PP')
                                    <p class="text-xs text-secondary mb-0">Polypropylene</p>
                                    @elseif ($o->type == 'PS')
                                    <p class="text-xs text-secondary mb-0">Polystyrene</p>
                                    @else
                                    <p class="text-xs text-secondary mb-0">Other</p>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="text-xs font-weight-bold">{{ number_format($o->price_kg, 0, ',', '.')}}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-xs font-weight-bold">{{ number_format($o->price_gram, 0, ',', '.')}}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-xs font-weight-bold">{{ number_format($o->price_pcs, 0, ',', '.')}}</span>
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

    $(document).ready( function () {
        $('#dataTablePengepul').DataTable();
    } );
</script>

<script>
    $(document).on('click', '.pilihPengepul', function (e) {
        $('#pengepul_id').val($(this).attr('data-id'));
        $('#pengepul_name').val($(this).attr('data-name'));
        $('#pengepulData').modal('hide');
    });
</script>

<script>
    $(document).on('click', '.pilihSampah', function (e) {
        $('#sampah_id').val($(this).attr('data-id'));
        $('#sampah_name').val($(this).attr('data-name'));
        $('#stok').val($(this).attr('data-stok'));
        $('#displayStok').text($(this).attr('data-displaystok'));
        $('#hargakg').val($(this).attr('data-hargakg'));
        $('#hargag').val($(this).attr('data-hargag'));
        $('#displayHargaKg').text($(this).attr('data-displaykg'));
        $('#displayHargaG').text($(this).attr('data-displayg'));
        $('#sampahData').modal('hide');
    });
</script>
@endpush