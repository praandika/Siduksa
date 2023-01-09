@section('button-title','Tambah Penjadwalan')
@include('component.button-add')
<div class="card card-frame mb-4" id="dataCreate" @if(Session::has('display')) style="display: block;" @else
    style="display: none;" @endif">
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
        <form action="{{ route('penjadwalan.store') }}" method="post">
            @csrf
            <p class="text-uppercase text-sm">Penjadwalan Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pilih Mesin</label>
                        <input class="form-control" type="text" name="mesin" id="mesin" value="{{ old('mesin') }}"
                            placeholder="Pilih mesin..." data-bs-toggle="modal" data-bs-target="#mesinModal"
                            required autofocus readonly>
                        <input type="hidden" name="mesin_id" id="mesin_id" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pilih Data Konversi</label>
                        <input class="form-control" type="text" name="konversi" id="konversi" value="{{ old('konversi') }}"
                            placeholder="Pilih data konversi..." data-bs-toggle="modal" data-bs-target="#konversiModal"
                            required autofocus readonly>
                        <input type="hidden" name="konversi_id" id="konversi_id" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok Awal (Gram)</label>
                        <input class="form-control" type="text" name="first_stock" id="first_stock" value="{{ old('first_stock') }}"
                            placeholder="Stok awal..." readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal</label>
                        <input class="form-control" type="datetime-local" name="total_weight" value="{{ $now }}"
                            placeholder="Masukkan tanggal..." readonly>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>

<!-- Mesin Modal -->
<div class="modal fade" id="mesinModal" tabindex="-1" role="dialog" aria-labelledby="mesinModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mesinModalLabel">Pilih Mesin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="tableMesin">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($mesin as $o)
                            <tr class="pilihMesin" data-mesin_id="{{ $o->id }}" data-mesin_name="{{ $o->name }}">
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $no++ }}</span>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ $o->status == 'online' ? asset('assets/img/robot-on.gif') : asset('assets/img/robot-off.png') }}" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->capacity }} Kg</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm">
                                    <span class="badge badge-sm {{ $o->status == 'online' ? 'bg-gradient-success' : 'bg-gradient-secondary' }} ">{{ $o->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center;">
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
<!-- END Mesin Modal -->

<!-- Konversi Modal -->
<div class="modal fade" id="konversiModal" tabindex="-1" role="dialog" aria-labelledby="konversiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konversiModalLabel">Pilih Konversi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="tableKonversi">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery Factor</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recovery Factor</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($konversi as $o)
                            <tr class="pilihKonversi" data-konversi_id="{{ $o->id }}" data-konversi_name="{{ $o->sampahPlastik->name }}" data-first_stock="{{ $o->total_weight * 1000 }}">
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
                                            <h6 class="mb-0 text-sm">{{ $o->sampahPlastik->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $o->total_weight }} {{ $o->satuan }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{ $o->recovery_factor }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center;">
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
<!-- END Konversi Modal -->

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

</script>

<script>
    $(document).on('click', '.pilihMesin', function (e) {
        $('#mesin_id').val($(this).attr('data-mesin_id'));
        $('#mesin').val($(this).attr('data-mesin_name'));
        $('#mesinModal').modal('hide');
    });

    $(document).on('click', '.pilihKonversi', function (e) {
        $('#konversi_id').val($(this).attr('data-konversi_id'));
        $('#konversi').val($(this).attr('data-konversi_name'));
        $('#first_stock').val($(this).attr('data-first_stock'));
        $('#konversiModal').modal('hide');
    });
</script>

<script>
    $(document).ready( function () {
        $('#tableKonversi').DataTable();
    } );

    $(document).ready( function () {
        $('#tableMesin').DataTable();
    } );
</script>
@endpush
