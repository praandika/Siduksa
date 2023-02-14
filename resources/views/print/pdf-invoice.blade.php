<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>

    <style>
        html {
            margin: 0;
        }

        body {
            padding: 0;
            margin: 0;
            font-family: Helvetica, Arial, sans-serif;
        }

        .logo {
            display: inline-block;
            margin-top: 30px;
            padding-left: 30px;
        }

        .list {
            background-color: #ffc809;
        }

        .invoiceTo tr th,
        .invoiceTo tr td {
            text-align: left;
        }

        .tbData thead tr th,
        .tbData thead tr td {
            text-align: left;
        }

        .tbData tr th,
        .tbData tr td {
            padding: 10px;
        }

        .tbData tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tbData tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

    </style>
</head>

<body>
    <span class="logo">
        <img src="assets/img/logo-2.png" width="100">
    </span>
    <br>
    <table class="title">
        <tr>
            <td>
                <div class="list" style="width: 300px;
            height: 30px;"></div>
            </td>
            <td style="font-size: 30px; padding: 0 10px 0 10px; font-weight: bold;">INVOICE</td>
            <td>
                <div class="list" style="width: 105px; height: 30px;"></div>
            </td>
        </tr>
    </table>
    <table style="padding: 10px 30px 10px 30px;" class="invoiceTo">
        <tbody>
            <tr>
                <th style="width: 300px;">
                    Invoice to:
                </th>
            </tr>
            <tr>
                <th style="font-size: 10px;">
                    {{ $invoiceTo }}
                </th>

                <th style="text-align: right; font-size: 10px; width: 185px;" rowspan="2">
                    {{ $invoice }} <br>
                    <span class="date"
                        style="color: grey; font-weight: normal;">{{ Carbon\Carbon::parse($date)->format('j F Y') }}</span>
                </th>
            </tr>
            <tr>
                <td style="font-size: 9px; color: grey;">
                    {{ $address }}
                </td>
            </tr>
        </tbody>
    </table>

    <table
        style="padding: 10px 30px 10px 30px; font-size: 12px; width: 100%; border-collapse: collapse; border: 1px solid #373b46;"
        class="tbData">
        <thead style="background-color: #373b46; color: #ffffff;">
            <tr>
                <th>Item Description</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $o)
            <tr>
                <td>
                    @if($param == 'penjualan')
                        {{ $o->sampahCacah->name }}
                    @else
                        {{ $o->sampahPlastik->name }}
                    @endif
                </td>
                <td>{{ $o->qty }} {{ $o->satuan }}</td>
                <td>Rp {{ number_format($o->harga, 0, ',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table style="width: 100%; padding: 10px 30px 10px 30px; border-collapse: collapse;">
        <tr>
            <th style="font-size: 10px; text-align: left;">Thank you for your business</th>
            <th style="text-align: right; background-color: #ffc809; padding: 8px 0 8px 0;">Total</th>
            <th style="text-align: right; background-color: #ffc809; padding: 8px 8px 8px 0;">: Rp
                {{ number_format($grandTotal, 0, ',','.') }}</th>
        </tr>
    </table>
</body>

</html>
