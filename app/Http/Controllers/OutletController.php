<?php

namespace App\Http\Controllers;

use App\Exports\OutletExport;
use App\Exports\OutletsExport;
use App\Models\Cabang;
use App\Models\Kota;
use App\Models\Outlet;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $outletsQuery = Outlet::with('provinsi', 'kota', 'cabang');
        $searchQuery = $request->input('search');

        if ($user->level === "BC") {
            $branch = Cabang::where('nama_cabang', $user->cabang)->first();
            $outletsQuery->where('code_cabang', $branch->code_cabang);
        }

        if ($searchQuery) {
            $outletsQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama_outlet', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('alamat', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('code_outlet', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhereHas('provinsi', function ($query) use ($searchQuery) {
                        $query->where('nama_provinsi', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('kota', function ($query) use ($searchQuery) {
                        $query->where('nama_kota', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('cabang', function ($query) use ($searchQuery) {
                        $query->where('nama_cabang', 'LIKE', '%' . $searchQuery . '%');
                    });
            });
        }

        $data = $outletsQuery->paginate(10);

        return view('pages.outlet.index', compact('data'));
    }

        public function export()
        {

            return Excel::download(new OutletExport, 'outlets.xlsx');
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.outlet.create');
    }

    public function createExel()
    {
        return view('pages.outlet.createExel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_outlet' => 'required|unique:master_outlet_jrecare,nama_outlet',
            'alamat' => 'required',
            'code_provinsi' => 'required',
            'code_kota' => 'required',
            'code_cabang' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $provinsi = Provinsi::firstOrCreate('nama_provinsi', $request->input('nama_provinsi'));
            $codeProvinsi = $provinsi->wasRecentlyCreated ? $provinsi->id : $provinsi->code_provinsi;

            $kota = Kota::firstOrCreate('nama_kota', $request->input('nama_kota'));
            $codeKota = $kota->wasRecentlyCreated ? $kota->id : $kota->code_kota;

            $cabang = Cabang::firstOrCreate('nama_cabang', $request->input('nama_cabang'));
            $codeCabang = $cabang->wasRecentlyCreated ? $cabang->id : $cabang->code_cabang;

            $data = new Outlet();
            $data->nama_outlet = $request->input('nama_outlet');
            $data->alamat = $request->input('alamat');
            $data->code_provinsi = $codeProvinsi;
            $data->code_kota = $codeKota;
            $data->code_cabang = $codeCabang;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function storeExel(Request $request)
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
            $provinsi = Provinsi::firstOrCreate(['nama_provinsi' => $namaProvinsi]);
            // Dapatkan kode Provinsi, jika record baru dibuat, gunakan null
            $codeProvinsi = $provinsi->wasRecentlyCreated ? $provinsi->id : $provinsi->code_provinsi;
            // Cari atau buat record Kota
            $kota = Kota::firstOrCreate(['nama_kota' => $namaKota]);
            // Dapatkan kode Kota, jika record baru dibuat, gunakan null
            $codeKota = $kota->wasRecentlyCreated ? $kota->id : $kota->code_kota;

            // Cari atau buat record Cabang
            $cabang = Cabang::firstOrCreate(['nama_cabang' => $namaCabang]);
            // Dapatkan kode Cabang, jika record baru dibuat, gunakan null
            $codeCabang = $cabang->wasRecentlyCreated ? $cabang->id : $cabang->code_cabang;

            // Simpan data Outlet
            $outlet = new Outlet();
            $outlet->nama_outlet = $namaOutlet;
            $outlet->code_provinsi = $codeProvinsi;
            $outlet->code_kota = $codeKota;
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
