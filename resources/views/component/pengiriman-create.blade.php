
@section('button-title','Tambah Pengiriman')
@include('component.button-add')
<div class="card card-frame mb-4" id="dataCreate" @if(Session::has('display')) style="display: block;" @else style="display: none;" @endif">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-10">
                <h6>Tambah Data</h6>
            </div>
            <div class="col-2">
                <h4 class="card-title" style="text-align: right; cursor: pointer; color: red;" id="btnCloseCreate">
                    <i class="fas fa-times-circle"></i>
                </h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('pengiriman.store') }}" method="post">
            @csrf
            <p class="text-uppercase text-sm">Pengiriman Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Pengiriman</label>
                        <input class="form-control" type="date" name="date" value="{{ $now }}" placeholder="Masukkan tanggal pengiriman..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Produksi</label>
                        <input class="form-control" type="date" name="production_date" value="{{ $now }}" placeholder="Masukkan tanggal pengiriman..." required autofocus>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode Mesin</label>
                        <input type="hidden" name="mesin_id" id="mesin_id">
                        <input class="form-control" id="mesin_name" type="text" name="mesin_name" placeholder="Pilih Mesin" data-bs-toggle="modal" data-bs-target="#mesinData" readonly required>
                    </div>
                </div> -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sampah Cacah</label>
                        <input class="form-control" id="sampah_name" type="text" name="sampah_name" placeholder="Pilih Sampah Cacah" data-bs-toggle="modal" data-bs-target="#sampahData" readonly required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Dikirim (Gram)</label>
                        <input class="form-control" id="qtykirim" type="text" name="qtykirim" placeholder="Total Berat (Gram)" readonly required>
                    </div>
                </div>

                <input type="hidden" name="invoice" id="invoice">
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>

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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($sampah as $o)
                            <tr 
                            data-id="{{ $o->invoice }}"
                            data-name="{{ $o->invoice }}"
                            data-qty="{{ $o->qty }}"
                            class="pilihSampah">
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
                                            <h6 class="mb-0 text-sm">{{ $o->invoice }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ number_format($o->qty, 0, ',', '.') }} Gram</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>#</td>
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
<!-- END Sampah Cacah Modal -->


@push('after-script')
<script>
    $(document).ready(function () {
        $('#btnCreate').click(function () {
            $(this).css('display', 'none');
            $('#dataCreate').fadeIn();
        });

        $('#btnCloseCreate').click(function () {
            $('#dataCreate').css('display', 'none');
            $('#btnCreate').fadeIn();
        });
    });

    $(document).on('click', '.pilihSampah', function (e) {
        $('#invoice').val($(this).attr('data-id'));
        $('#sampah_name').val($(this).attr('data-name'));
        $('#qtykirim').val($(this).attr('data-qty'));
        $('#sampahData').modal('hide');
    });

    $(document).on('click', '.pilihMesin', function (e) {
        $('#mesin_id').val($(this).attr('data-id'));
        $('#mesin_name').val($(this).attr('data-name'));
        $('#mesinData').modal('hide');
    });

</script>
@endpush
