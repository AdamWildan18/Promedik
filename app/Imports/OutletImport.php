<?

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Outlet;


class OutletImport implements ToModel
{
    public function model(array $row)
    {
        // Temukan ID provinsi berdasarkan nama
        $provinsi = Provinsi::where('nama_provinsi', $row[4])->first();
        $provinsi_id = $provinsi ? $provinsi->code_provinsi : null;

        // Temukan ID kota berdasarkan nama
        $kota = Kota::where('nama_kota', $row[3])->first();
        $kota_id = $kota ? $kota->code_cabang : null;

        // Temukan ID cabang berdasarkan nama
        $cabang = Cabang::where('nama_cabang', $row[5])->first();
        $cabang_id = $cabang ? $cabang->code_cabang : null;

        return new Outlet([
            'nama_outlet' => $row[1],
            'alamat' => $row[2],
            'code_provinsi' => $provinsi_id,
            'code_kota' => $kota_id,
            'code_cabang' => $cabang_id,
        ]);
    }
}
