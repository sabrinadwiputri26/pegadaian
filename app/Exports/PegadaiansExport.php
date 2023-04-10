<?php

namespace App\Exports;

use App\Models\Pegadaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PegadaiansExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pegadaian::with('response')->orderBy('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIK Pelapor',
            'Nama Pelapor',
            'No Telp Pelapor',
            'Tanggal Pelaporan',
            'Pegadaian',
            'Status Response',
            'Pesan Response',

        ];
    }

    public function map($item): array
    {
        if($item->response){
            if($item->response['status' == 'ditolak']){
                $pesan = '-';
            }else{
                $pesan = $item->response['pesan'];
            }
        }
        else{
            $pesan = '-';
        }

        return[
            $item->id,
            $item->nik,
            $item->nama,
            $item->no,
            \Carbon\Carbon::parse($item->created_at)->format('j F, Y'),
            $item->pegadaian,
            $item->response ? $item->response['status'] : '-',
            $item->response ? $item->response['pesan'] : '-',
        ];
    }
}

