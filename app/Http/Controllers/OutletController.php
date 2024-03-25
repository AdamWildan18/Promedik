<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Outlet::with('provinsi', 'kota', 'cabang')->get();

        return view('pages.outlet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $pathToFile = $request->file('excel_file')->getPathName();

        $spreadsheet = IOFactory::load($pathToFile);
        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; ++$row) {
            $namaOutlet = $worksheet->getCell('B'.$row)->getValue();
            $namaProvinsi = $worksheet->getCell('E'.$row)->getValue();
            $namaKota = $worksheet->getCell('D'.$row)->getValue();
            $namaCabang = $worksheet->getCell('F'.$row)->getValue();
            $alamat = $worksheet->getCell('C'.$row)->getValue();

            // Cari atau buat record Provinsi
            $provinsi = Provinsi::where('nama_provinsi', $namaProvinsi)->first();
            if (!$provinsi) {
                $provinsi = new Provinsi();
                $provinsi->nama_provinsi = $namaProvinsi;
                // Generate kode unik untuk provinsi
                $provinsi->save();
            }
            $codeProvinsi = $provinsi->code_provisi;

            // Cari atau buat record Kota
            $kota = Kota::where('nama_kota', $namaKota)->first();
            if (!$kota) {
                $kota = new Kota();
                $kota->nama_kota = $namaKota;
                // Generate kode unik untuk kota
                $kota->save();
            }
            $codeKota = $kota->code_kota;

            // Cari atau buat record Cabang
            $cabang = Cabang::where('nama_cabang', $namaCabang)->first();
            if (!$cabang) {
                $cabang = new Cabang();
                $cabang->nama_cabang = $namaCabang;
                // Generate kode unik untuk cabang
                $cabang->save();
            }
            $codeCabang = $cabang->code_cabang;

            // Simpan data Outlet
            $outlet = new Outlet();
            $outlet->nama_outlet = $namaOutlet;
            $outlet->code_provinsi = $codeProvinsi;
            $outlet->code_kota = $codeKota; // Pastikan code_kota diatur
            $outlet->code_cabang = $codeCabang;
            $outlet->alamat = $alamat;
            $outlet->save();

        }

        // Berikan respons jika selesai memproses semua baris
        return response()->json(['success' => true, 'message' => 'Data from Excel successfully saved']);
    }

    public function edit(Request $request, $id)
    {
        $data = Outlet::find($id);

        if(!$data)
        {
            return redirect()->back();
        }

        return view('pages.outlet.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_outlet' => 'required',
            'jenis_outlet' => 'required',
            'type_outlet' => 'required',
            'nama_direktur' => '',
            'nama_ok' => '',
            'ppk' => '',
            'if_farmasi' => '',
            'listing_product' => '',
            'proges_outlet' => '',
            'keterangan' => '',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Outlet::find($id);

            if(!$data)
            {
                return redirect()->back();
            }

            $data->name = $request->input('name');
            $data->code_outlet = $request->input('code_outlet');
            $data->jenis_outlet = $request->input('jenis_outlet');
            $data->type_outlet = $request->input('type_outlet');
            $data->nama_direktur = $request->input('nama_direktur');
            $data->nama_ok = $request->input('nama_ok');
            $data->ppk = $request->input('ppk');
            $data->if_farmasi = $request->input('if_farmasi');
            $data->listing_product = $request->input('listing_product');
            $data->proges_outlet = $request->input('proges_outlet');
            $data->keterangan = $request->input('keterangan');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function destroy($id)
    {
        Outlet::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
