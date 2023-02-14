<div class="col-lg-6 mb-lg-0 mb-4">
    <div class="card ">
        <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Transaksi Baru</h6>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center ">
                <tbody>
                    @forelse($data as $o)
                    <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                    <img src="{{ asset('assets/img/icon-sampah.png') }}" alt="Sampah Icon">
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">Sampah Plastik</p>
                                    <h6 class="text-sm mb-0">{{ $o->sampahPlastik->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Type</p>
                                <h6 class="text-sm mb-0">{{ $o->sampahPlastik->type }}</h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Value:</p>
                                <h6 class="text-sm mb-0">Rp {{ number_format($o->harga, 0, ',','.') }}</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                                <p class="text-xs font-weight-bold mb-0">Qty</p>
                                <h6 class="text-sm mb-0">{{ $o->qty }} {{ $o->satuan }}</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                                <p class="text-xs font-weight-bold mb-0">Tanggal</p>
                                <h6 class="text-sm mb-0">{{ \Carbon\Carbon::parse($o->date)->format('j F Y') }}</h6>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
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
