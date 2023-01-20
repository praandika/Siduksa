@section('button-title','Tambah Konversi')
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
        <form action="{{ route('konversi.store') }}" method="post">
            @csrf
            <p class="text-uppercase text-sm">Konversi Information</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pilih Sampah</label>
                        <input class="form-control" type="text" name="sampah" id="sampah" value="{{ old('sampah') }}"
                            placeholder="Pilih sampah plastik..." data-bs-toggle="modal" data-bs-target="#sampahPlastik"
                            required autofocus readonly>
                        <input type="hidden" name="sampah_plastik" id="sampah_id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Stok (Gram)</label>
                        <input class="form-control" type="hidden" name="stok" id="stok" value="{{ old('stok') }}"
                            placeholder="Stok sampah plastik..." readonly>
                        <input class="form-control" type="text" id="displayStok"
                            placeholder="Stok sampah plastik..." readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Berat (Gram)</label>
                        <input class="form-control" type="text" name="total_weight" value="{{ old('total_weight') }}"
                            placeholder="Masukkan total berat sampah plastik...">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>

<!-- Sampah Plastik Modal -->
<div style="z-index: 9999;" class="modal fade" id="sampahPlastik" tabindex="-1" role="dialog" aria-labelledby="sampahPlastikLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sampahPlastikLabel">Pilih Sampah Plastik</h5>
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
                            @forelse($sampahPlastik as $o)
                            <tr data-id="{{ $o->id }}" data-name="{{ $o->name }}" data-stok="{{ $o->stock * 1000 }}" data-displaystok="{{ number_format($o->stock * 1000, 0, ',', '.') }}" class="pilih">
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
    $(document).on('click', '.pilih', function (e) {
        $('#sampah_id').val($(this).attr('data-id'));
        $('#sampah').val($(this).attr('data-name'));
        $('#stok').val($(this).attr('data-stok'));
        $('#displayStok').val($(this).attr('data-displaystok'));
        $('#sampahPlastik').modal('hide');
    });
</script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>
@endpush
