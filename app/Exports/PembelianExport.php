<?php

namespace App\Exports;

use App\Models\Pembelian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PembelianExport implements FromView
{
    use Exportable;

    public function start(string $start)
    {
        $this->start = $start;
        return $this;
    }

    public function end(string $end)
    {
        $this->end = $end;
        return $this;
    }

    public function view(): View{
        return view('export.pembelian',[
            'data' => Pembelian::whereBetween('date', [$this->start, $this->end])
            ->orderBy('date','asc')->get()
        ]);
    }
}
