<?php

namespace App\Exports;

use App\Models\Cabang;
use App\Models\Outlet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OutletExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = Auth::user();
        $outletsQuery = Outlet::with(['provinsi', 'kota', 'cabang']);

        if ($user->level === "BC") {
            $branch = Cabang::where('nama_cabang', $user->cabang)->first();
            $outletsQuery->where('code_cabang', $branch->code_cabang);
        }
        return $outletsQuery->get()
            ->map(function ($outlet) {
                return [
                    'Code Outlet' => $outlet->code_outlet,
                    'Nama Outlet' => $outlet->nama_outlet,
                    'Alamat' => $outlet->alamat,
                    'Provinsi' => $outlet->provinsi->nama_provinsi,
                    'Kota' => $outlet->kota->nama_kota,
                    'Cabang' => $outlet->cabang->nama_cabang,
                ];
            });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Code Outlet',
            'Nama Outlet',
            'Alamat',
            'Provinsi',
            'Kota',
            'Cabang',
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Apply bold font to heading row
        ];
    }
}
