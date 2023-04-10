<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pegadaian Masyarakat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/data.css')}}">
</head>
<body>
    <h2 class="title-table">Laporan Keluhan (Petugas)</h2>
<div style="display: flex; justify-content: center; margin-bottom: 50px">
    <a href="/logout" style="text-align: center">Logout</a> 
    <div style="margin: 0 30px"> | </div>
    <a href="/dashboard" style="text-align: center">Home</a>
</div>

<div style="display: flex; justify-content: flex-end; align-items: center;">
    <form action="" method="GET">
        @csrf
    <select name="search" id="search">
        <option selected hidden disabled>Pilih Status</option>
        <option value="diterima">Diterima</option>
        <option value="ditolak">Ditolak</option>
        <option value="diproses">Diproses</option>
        </select>
    <button type="submit" class="fas fa-search"></button>
    
    </form>
    <a href="{{route('data.petugas')}}" style="margin-right:30px; margin-left: 20px; margin-top:-20px">Refresh</a>
    {{-- <a href="{{route('export-PDF')}}" style="margin-right:30px; margin-left: 10px; margin-top:-20px">Cetak PDF</a> --}}
</div>

<div style="padding: 0 30px">
    <table>
        <table class="table">
            <thead class="table-dark">
        <thead>
        <tr>
            <th width="5%">No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>pegadaian</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Location</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody> 
            
                @php
                    $no = 1;
                    $search = '';
                    if (@$_GET['search']){
                        $search = $_GET['search'];
                    }
                @endphp
                @foreach ($pegadaians as $pegadaian)
                @if ($search !== '')
                @if ($pegadaian->response)
                @if ($pegadaian->response['status'] == $search)
       
            <tr>
                <td>{{$no++}}</td>
                <td>{{$pegadaian['nik']}}</td>
                <td>{{$pegadaian['nama']}}</td>
                <td>{{$pegadaian['no']}}</td>
                <td>{{$pegadaian['pegadaian']}}</td> 
                <td>
                    <img src="{{asset('assets/image/'.$pegadaian->foto)}}" width="120">
                </td>
                <td>
                    @if ($pegadaian->response)
                    {{$pegadaian->response['status']}}
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if ($pegadaian->response)
                    {{$pegadaian->response['pesan']}}
                    @else
                    -
                    @endif
                </td>
                <td style="display: flex; justify-content: center;">
                <a href="{{route('response.edit', $pegadaian->id)}}" 
                    class="back-btn">Send Response</a>
            </td>
            </tr>
           @endif
           @endif
           @else
           <tr>
            <td>{{$no++}}</td>
            <td>{{$pegadaian['nik']}}</td>
            <td>{{$pegadaian['nama']}}</td>
            <td>{{$pegadaian['no']}}</td>
            <td>{{$pegadaian['pegadaian']}}</td> 
            <td>
                <img src="{{asset('assets/image/'.$pegadaian->foto)}}" width="120">
            </td>
            <td>
                @if ($pegadaian->response)
                {{$pegadaian->response['status']}}
                @else
                -
                @endif
            </td>
            <td>
                @if ($pegadaian->response)
                {{$pegadaian->response['pesan']}}
                @else
                -
                @endif
            </td>
            <td style="display: flex; justify-content: center;">
            <a href="{{route('response.edit', $pegadaian->id)}}" 
                class="back-btn">Send Response</a>
        </td>
        </tr>
           @endif
            @endforeach 
        </tbody>
    </table>
</div>
</body>
</html>