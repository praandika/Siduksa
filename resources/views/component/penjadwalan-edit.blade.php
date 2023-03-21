@section('title','Finishing')
@section('page-title','Finishing')
@push('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
<li class="breadcrumb-item text-sm text-white" aria-current="page" style="cursor: pointer;"><a class="text-white"
        href="{{ route('penjadwalan.index') }}">Penjadwalan</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Finishing</li>
@endpush

<div class="card card-frame mb-4">
    <div class="card-header pb-0">
        <h6>Finishind Data {{ $penjadwalan->id }} | {{ $penjadwalan->date_stock_in }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('penjadwalan.update', $penjadwalan->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="mesin_id" value="{{ $penjadwalan->mesin_id }}">
            <input type="hidden" name="first_stock" value="{{ $penjadwalan->first_stock }}">
            <div class="card">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="javascript:;" class="d-block">
                        <img src="{{ asset('assets/img/icon-sampah.png') }}" class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <span
                        class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Penjadwalan</span>
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        {{ $penjadwalan->status }}
                    </a>
                    <p class="card-description mb-4">
                        @if($penjadwalan->status == 'finished')
                        Proses daur ulang sampah plastik sudah selesai. <br>
                        Berat awal : {{ $penjadwalan->first_stock }} Kg <br>
                        Hasil akhir : {{ $penjadwalan->last_stock }} Kg <br>
                        Recovery Factor: {{ $penjadwalan->recovery_factor }}%
                        @else
                        Daur ulang sampah plastik masih dalam proses <br>
                        Berat awal : {{ $penjadwalan->first_stock }} Kg
                        @endif
                    </p>
                    <div class="author align-items-center">
                        <img src="{{ $penjadwalan->mesin->status == 'online' ? asset('assets/img/robot-on.gif') : asset('assets/img/robot-off.png') }}"
                            alt="..." class="avatar shadow">
                        <div class="name ps-3">
                            <span>{{ $penjadwalan->mesin->name }}</span>
                            <div class="stats">
                                <small>{{ $penjadwalan->status == 'finished' ? $penjadwalan->date_stock_out : $penjadwalan->date_stock_in }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Masukkan ke...</label>
                        <input class="form-control" type="text" name="sampah_cacah" id="sampah_cacah" placeholder="Pilih sampah cacah."
                        data-bs-toggle="modal" data-bs-target="#sampahModal" required>
                        <input type="hidden" name="sampah_cacah_id" id="sampah_cacah_id">
                        <input type="hidden" name="stock" id="stock">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Hasil Akhir (Gram)</label>
                        <input class="form-control" type="text" name="last_stock" id="last_stock" placeholder="Masukkan berat hasil akhir..."
                            required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-success"><i
                    class="fa fa-check"></i>&nbsp;&nbsp;Finishing</button>
        </form>
    </div>
</div>

<!-- sampah Modal -->
<div style="z-index: 9999;" class="modal fade" id="sampahModal" tabindex="-1" role="dialog" aria-labelledby="sampahModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sampahModalLabel">Pilih Sampah Cacah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="tablesampah">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sampah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($no = 1)
                            @forelse($sampahCacah as $o)
                            <tr class="pilihSampah" data-sampah_id="{{ $o->id }}" data-sampah_name="{{ $o->name }}" data-stock="{{ $o->stock * 1000 }}">
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
                                    <span class="text-xs font-weight-bold">{{ $o->stock }} Kg</span>
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
<!-- END Sampah Modal -->

@push('after-script')
<script>
    $(document).on('click', '.pilihSampah', function (e) {
        $('#sampah_cacah_id').val($(this).attr('data-sampah_id'));
        $('#sampah_cacah').val($(this).attr('data-sampah_name'));
        $('#stock').val($(this).attr('data-stock'));
        $('#sampahModal').modal('hide');
    });

    $(document).ready( function () {
        $('#tablesampah').DataTable();
    } );
</script>
@endpush