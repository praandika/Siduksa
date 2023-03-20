
@section('title','Edit Pemilahan')
@section('page-title','Edit Pemilahan')
@push('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white" href="{{ route('pemilahan.index') }}">Pemilahan</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Pemilahan</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Pilah {{ $pemilahan->sampahPlastik->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pemilahan.update', $pemilahan->id) }}" method="post">
            @csrf
            @method('PUT')
            <p class="text-uppercase text-sm">Pemilahan Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Sampah</label>
                        <input class="form-control" type="text" name="name" value="{{ $pemilahan->sampahPlastik->name }}" placeholder="Masukkan nama sampah plastik..." required readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Berat</label>
                        <input class="form-control" type="text" name="total" value="{{ $pemilahan->satuan == 'Kg' ? number_format($pemilahan->total_weight * 1000, 0, ',', '.') : number_format($pemilahan->total_weight, 0, ',', '.') }} Gram" placeholder="Masukkan nama sampah plastik..." required readonly>
                        <input type="hidden" name="satuan" value="{{ $pemilahan->satuan }}">
                        <input type="hidden" name="totalWeight" value="{{ $pemilahan->total_weight }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sampah Dipilah ke...</label>
                        <input type="hidden" name="idSampah" id="idSampah">
                        <input type="hidden" name="stock" id="stock">
                        <input class="form-control" type="text" name="namaSampah" id="namaSampah" placeholder="Pilih Sampah" data-bs-toggle="modal" data-bs-target="#sampahPlastikData" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Pilah (Gram)</label>
                        <input class="form-control" type="text" name="qty" id="qty" placeholder="Masukkan Dalam Satuan Gram" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
    </div>
</div>

<!-- Sampah Plastik Modal -->
<div style="z-index: 9999;" class="modal fade" id="sampahPlastikData" tabindex="-1" role="dialog" aria-labelledby="sampahPlastikDataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sampahPlastikDataLabel">Pilih Sampah Plastik</h5>
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($sampahPlastik as $o)
                            <tr 
                            data-id="{{ $o->id }}"
                            data-name="{{ $o->name }}"
                            data-stock="{{ $o->stock * 1000 }}" class="pilihSampah">
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

@push('after-script')
<script>
    $(document).on('click', '.pilihSampah', function (e) {
        $('#idSampah').val($(this).attr('data-id'));
        $('#namaSampah').val($(this).attr('data-name'));
        $('#stock').val($(this).attr('data-stock'));
        $('#sampahPlastikData').modal('hide');
    });
</script>
@endpush