<?php

namespace App\Exports;

use App\Models\Penjadwalan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ProduksiExport implements FromView
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
        return view('export.produksi',[
            'data' => Penjadwalan::whereBetween('date_stock_in', [$this->start, $this->end])
            ->orderBy('date_stock_in','asc')->get()
        ]);
    }
}
