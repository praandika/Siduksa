<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

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
            background-color: #8e2ffa;
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
            font-size: 20px;
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
            <td style="font-size: 20px; padding: 0 10px 0 10px; font-weight: bold;">{{ strToUpper($title) }}</td>
            <td>
                <div class="list" style="width: 105px; height: 30px;"></div>
            </td>
        </tr>
    </table>
    <table style="padding: 10px 30px 10px 30px;" class="invoiceTo">
        <tbody>
            <tr>
                <th style="text-align: right; font-size: 10px; width: 185px;" rowspan="2">
                    Periode : {{ $start }} / {{ $end }} <br>
                </th>
            </tr>
        </tbody>
    </table>

    <table
        style="padding: 10px 30px 10px 30px; font-size: 12px; width: 100%; border-collapse: collapse; border: 1px solid #373b46;"
        class="tbData">
        <thead style="background-color: #373b46; color: #ffffff;">
            <tr>
                <th>Pembelian</th>
                <th>Penjualan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rp {{ number_format($pembelian, 0, ',','.') }}</td>
                <td>Rp {{ number_format($penjualan, 0, ',','.') }}</td>
            </tr>
        </tbody>
        <thead style="background-color: {{ $color }}; color: #ffffff;">
            <tr>
                <th>{{ $result }}</th>
                <th>Rp {{ number_format($laba, 0, ',','.') }}</th>
            </tr>
        </thead>
    </table>
</body>

</html>
