<table>
    <thead>
        <tr>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">No</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Mesin</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Tanggal Masuk</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Stok Awal</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Tanggal Keluar</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Hasil Akhir</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Recovery Factor</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Status</th>
        </tr>
    </thead>
    <tbody>
        @php($no = 1)
        @forelse($data as $o)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $o->mesin->name }}</td>
            <td>{{ $o->date_stock_in }}</td>
            <td>{{ $o->first_stock }} Kg</td>
            <td>{{ $o->date_stock_out }}</td>
            <td>{{ $o->last_stock }} Kg</td>
            <td>{{ $o->konversi->recovery_factor }}%</td>
            <td>{{ ucwords($o->status) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align: center;">No data available</td>
        </tr>
        @endforelse
    </tbody>
</table>