
@section('button-title','Tambah Sampah Cacah')
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
        <form action="{{ route('sampah-cacah.store') }}" method="post">
            @csrf
            <p class="text-uppercase text-sm">Sampah Cacah Information</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Sampah Cacah</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama sampah cacah..." required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Kg)</label>
                        <input class="form-control" type="text" name="price_kg" value="{{ old('price_kg') }}" placeholder="Masukkan harga kg sampah cacah..." required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Gram)</label>
                        <input class="form-control" type="text" name="price_gram" value="{{ old('price_gram') }}" placeholder="Masukkan harga gram sampah cacah...">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga (Pcs)</label>
                        <input class="form-control" type="text" name="price_pcs" value="{{ old('price_pcs') }}" placeholder="Masukkan harga pcs sampah cacah...">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Simpan</button>
            <button type="reset" class="btn bg-gradient-danger"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
        </form>
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
@endpush
