<?php

namespace App\Exports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OutletExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Ambil data outlet beserta relasinya yang ingin diekspor
        return Outlet::with(['provinsi', 'kota', 'cabang'])
            ->select('code_outlet', 'nama_outlet', 'alamat')
            ->get();
    }

    public function headings(): array
    {
        // Tentukan heading kolom Excel
        return [
            'Kode Outlet',
            'Nama Outlet',
            'Alamat',
            'Provinsi',
            'Kota',
            'Cabang',
            // Tambahkan kolom lain sesuai kebutuhan
        ];
    }
}
