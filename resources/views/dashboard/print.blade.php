<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak data pegadaian</title>
</head>
<body>
    <h2 style="text-align: center; margin-bottom: 20px">Data Keseluruhan pegadaian</h2>
    <table style="width: 100px"></table>
    <table>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Tanggal</th>
            <th>pegadaian</th>
            <th>Gambar</th>
            <th>Status Response</th>
            <th>Pesan Response</th>
        </tr>
        @php $no = 1;   
        @endphp
    @foreach ($pegadaians as $pegadaian)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$pegadaian['nik']}}</td>
        <td>{{$pegadaian['nama']}}</td>
        <td>{{$pegadaian['no']}}</td>
        <td>{{\Carbon\Carbon::parse($pegadaian['created_at'])->format('j F, Y')}}</td>
        <td>{{$pegadaian['pegadaian']}}</td>
        <td><img src="assets/image/{{$pegadaian['foto']}}" width="80" alt=""></td>
    </td>
    <td>
        @if ($pegadaian['response'])
        {{$pegadaian['response']['status']}}
        @else
        -
        @endif
    </td>
    <td>
        @if ($pegadaian['response'])
        {{$pegadaian['response']['pesan']}}
        @else
        -
        @endif
    </td>
    </tr>
    @endforeach
    </table>
</body>
</html>