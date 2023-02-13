<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sampah Plastik</p>
                        <h5 class="font-weight-bolder">
                            {{ $stok }}
                        </h5>
                        <p class="mb-0">
                            <span class="text-success text-sm font-weight-bolder">Rp {{ number_format($totalHarga, 0, ',','.') }}</span>
                            total harga
                        </p>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
