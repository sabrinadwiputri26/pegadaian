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
    <form action="{{route('response.update', $pegadaianId)}}" method="POST"
    style="width: 500px; margin:50px auto; display:block;">
    @csrf
    @method('PATCH')
    <div class="input-card">
        <label for="status">Status :</label>
        @if ($pegadaian)
        <select name="status" id="status">
            <option selected hidden disabled>Pilih Status</option>
            <option value="ditolak" {{$pegadaian['status'] == 'ditolak' ? 'selected' : '' }}>ditolak</option>
            <option value="diproses" {{$pegadaian['status'] == 'diproses' ? 'selected' : '' }}>diproses</option>
            <option value="diterima" {{$pegadaian['status'] == 'diterima' ? 'selected' : '' }}>diterima</option>
        </select>
       @else
        <select name="status" id="status">
            <option selected hidden disabled>Pilih Status</option>
            <option value="ditolak">ditolak</option>
            <option value="diproses">diproses</option>
            <option value="diterima">diterima</option>
        </select>
        @endif
    </div>
    <div class="input-card">
        <label for="pesan">Location :</label>
        <textarea name="pesan" id="pesan" rows="3">{{$pegadaian ? $pegadaian['pesan'] : ''}}</textarea>
    </div>
    <button type="submit">Kirim Response</button>
    </form>
</body>