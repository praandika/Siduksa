<div class="col-lg-3 mb-lg-0 mb-4">
    <div class="card ">
        <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Top Stok Sampah Cacah</h6>
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
                                    <img src="{{ asset('assets/img/'.$o->photo.'') }}" alt="Sampah Icon" width="60px">
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">Cacah</p>
                                    <h6 class="text-sm mb-0">{{ $o->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Stok</p>
                                <h6 class="text-sm mb-0">{{ $o->stock }} Kg</h6>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

