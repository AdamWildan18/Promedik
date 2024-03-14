<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Outlet::all();

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
            $data = new Outlet();
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
