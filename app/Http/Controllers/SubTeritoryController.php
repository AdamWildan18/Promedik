<?php

namespace App\Http\Controllers;

use App\Models\SubTeritory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubTeritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubTeritory::all();
        return view('pages.sub_teritory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sub_teritory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_sub_teritories' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new SubTeritory();
            $data->name = $request->input('name');
            $data->code_sub_teritories = $request->input('code_sub_teritories');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = SubTeritory::find($id);

        if(!$data)
        {
            return redirect()->back();
        }

        return view('pages.sub_teritory.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_sub_teritories' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = SubTeritory::find($id);

            if(!$data)
            {
                return redirect()->back();
            }

            $data->name = $request->input('name');
            $data->code_sub_teritories = $request->input('code_sub_teritories');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function destroy($id)
    {
        SubTeritory::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
