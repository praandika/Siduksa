<div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pembelian {{ $year }}</p>
                        <h5 class="font-weight-bolder">
                            Rp {{ number_format($total, 0, ',','.') }}
                        </h5>
                        <p class="mb-0">
                            <span class="text-success text-sm font-weight-bolder">{{ $percent }}%</span> dari kemarin
                        </p>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
