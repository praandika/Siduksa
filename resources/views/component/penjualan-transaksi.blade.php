@section('title','Transaksi Penjualan')
@section('page-title','Transaksi Penjualan')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi Penjualan</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-12">
                <h6>Penjualan</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('penjualan.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <p class="text-uppercase text-sm">{{ $invoice }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-uppercase text-sm" style="text-align: right;">Kasir: {{ Auth::user()->name }}</p>
                </div>
            </div>
            
            <input type="hidden" name="invoice" value="{{ $invoice }}">
            <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal</label>
                        <input class="form-control" type="text" name="date" value="{{ $now }}" placeholder="Masukkan tanggal..." required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Supplier</label>
                        <input type="hidden" value="{{ $supplierId }}" name="supplier_id" id="supplier_id">
                        <input class="form-control" type="text" name="supplier_name" value="{{ $supplierName }}" id="supplier_name" placeholder="Pilih supplier" @if($isInv == 0) data-bs-toggle="modal" data-bs-target="#supplierData" @else readonly @endif required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sampah Cacah</label>
                        <input type="hidden" name="sampah_id" id="sampah_id">
                        <input class="form-control" id="sampah_name" type="text" name="sampah_name" placeholder="Pilih sampah" data-bs-toggle="modal" data-bs-target="#sampahData" readonly required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok</label>
                        <input class="form-control" type="hidden" id="stok" name="stock" required>
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
                        <label for="example-text-input" class="form-control-label">
                            Qty &nbsp;
                            <input type="radio" name="berat" id="gram" value="gram" checked><label for="gram">Gram</label> &nbsp;
                            <input type="radio" name="berat" id="kg" value="kg"><label for="kg">Kg</label>
                        </label>
                        <input class="form-control" type="number" name="qty" id="qty" onkeyup="hitungTotal();" min="0" required>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total (Rp)</label>
                        <input class="form-control" type="number" value="{{ number_format($total, 0, ',', '.') }}" style="background-color: #f0ebb4; font-size: 50px; font-weight: bold;" id="total">
                        <input type="hidden" name="total" id="angkaTotal" value="{{ $total }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Sell</button>
            <a href="{{ route('print.invoice',['param' => 'penjualan','invoice' => $invoice]) }}" type="button" class="btn bg-gradient-success" target="_blank"><i class="fas fa-print"></i>&nbsp;&nbsp;Print Invoice</a>
        </form>
    </div>
</div>

<!-- TABEL DATA -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Detail Transaksi Penjualan</h6>
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
                                                <img src="{{ asset('assets/img/sparkling.gif') }}" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ number_format($o->qty, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $o->satuan }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ number_format($o->harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('transaksi-penjualan.delete', $o->id_transaksi) }}" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return tanya('Yakin hapus transaksi {{ $o->name }} {{ $o->qty }} {{ $o->satuan }}?')">
                                            <i class="fas fa-trash" style="color: Crimson;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>#</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td></td>
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

<!-- Supplier Modal -->
<div style="z-index: 9999;" class="modal fade" id="supplierData" tabindex="-1" role="dialog" aria-labelledby="supplierDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierDataLabel">Pilih Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="dataTableSupplier">
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
                            @forelse($supplier as $o)
                            <tr data-id="{{ $o->id }}" data-name="{{ $o->name }}" class="pilihSupplier">
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

<a href="{{ route('penjualan.index') }}" type="button" class="btn bg-gradient-info"><i class="fas fa-history"></i>&nbsp;&nbsp;History</a>

<!-- Sampah Cacah Modal -->
<div style="z-index: 9999;" class="modal fade" id="sampahData" tabindex="-1" role="dialog" aria-labelledby="sampahDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sampahDataLabel">Pilih Sampah Cacah</h5>
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
                            data-hargag="{{ $o->price_gram }}"
                            data-displaykg="Rp {{ number_format($o->price_kg, 0, ',', '.') }} /Kg"
                            data-displayg="Rp {{ number_format($o->price_gram, 0, ',', '.') }} /Gram"
                            data-displaystok="{{ number_format($o->stock * 1000, 0, ',', '.') }} Gram" class="pilihSampah">
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets/img/sparkling.gif') }}"
                                                class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ number_format($o->stock * 1000, 0, ',', '.') }} Gram</p>
                                        </div>
                                    </div>
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
        $('#dataTableSupplier').DataTable();
    } );
</script>

<script>
    $(document).on('click', '.pilihSupplier', function (e) {
        $('#supplier_id').val($(this).attr('data-id'));
        $('#supplier_name').val($(this).attr('data-name'));
        $('#supplierData').modal('hide');
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

<script>
    function hitungTotal(){
        let berat;
        let jumlah = 0;
        let radios = document.getElementsByName('berat');
        for (let radio of radios) {
            if (radio.checked) {
                berat = radio.value;
            }
        }
        
        let qty = document.getElementById("qty").value;
        let total = document.getElementById("angkaTotal").value;
        let hargag = document.getElementById("hargag").value;
        let hargakg = document.getElementById("hargakg").value; 
        
        if (berat == 'gram') {
            jumlah = (parseFloat(hargag)*parseFloat(qty)) + parseFloat(total);
        } else {
            jumlah = (parseFloat(hargakg)*parseFloat(qty)) + parseFloat(total);
        }
        
        document.getElementById("total").value = jumlah;
        console.log(qty, jumlah);
    }
</script>
@endpush