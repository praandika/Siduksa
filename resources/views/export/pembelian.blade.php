<table>
    <thead>
        <tr>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">No</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Invoice</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Pengepul</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Tanggal</th>
            <th style="color: white; background-color: #5e61cd; font-weight: bold;">Total Pembelian</th>
        </tr>
    </thead>
    <tbody>
        @php($no = 1)
        @forelse($data as $o)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $o->invoice }}</td>
            <td>{{ $o->pengepul->name }}</td>
            <td>{{ $o->date }}</td>
            <td>{{ $o->total }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center;">No data available</td>
        </tr>
        @endforelse
    </tbody>
</table>