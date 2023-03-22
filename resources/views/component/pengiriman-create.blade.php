
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode Mesin</label>
                        <input type="hidden" name="mesin_id" id="mesin_id">
                        <input class="form-control" id="mesin_name" type="text" name="mesin_name" placeholder="Pilih Mesin" data-bs-toggle="modal" data-bs-target="#mesinData" readonly required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sampah Cacah</label>
                        <input type="hidden" name="sampah_id" id="sampah_id">
                        <input class="form-control" id="sampah_name" type="text" name="sampah_name" placeholder="Pilih Sampah Cacah" data-bs-toggle="modal" data-bs-target="#sampahData" readonly required>
                    </div>
                </div>
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (kg)
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga (gram)
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
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($sampah as $o)
                            <tr 
                            data-id="{{ $o->id }}"
                            data-name="{{ $o->name }}"
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
                                            <h6 class="mb-0 text-sm">{{ $o->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ number_format($o->stock * 1000, 0, ',', '.') }} Gram</p>
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
                                    @elseif ($o->type == 'Campuran')
                                    <p class="text-xs text-secondary mb-0">Campuran</p>
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
<!-- END Sampah Cacah Modal -->

<!-- Mesin Modal -->
<div style="z-index: 9999;" class="modal fade" id="mesinData" tabindex="-1" role="dialog" aria-labelledby="mesinDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mesinDataLabel">Pilih Mesin</h5>
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
                            <tr 
                            data-id="{{ $o->id }}"
                            data-name="{{ $o->name }}"
                            class="pilihMesin">
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
                                <td>#</td>
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
<!-- END Mesin Modal -->

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
        $('#sampah_id').val($(this).attr('data-id'));
        $('#sampah_name').val($(this).attr('data-name'));
        $('#sampahData').modal('hide');
    });

    $(document).on('click', '.pilihMesin', function (e) {
        $('#mesin_id').val($(this).attr('data-id'));
        $('#mesin_name').val($(this).attr('data-name'));
        $('#mesinData').modal('hide');
    });

</script>
@endpush
