<?php

namespace App\Http\Controllers;

use App\Models\Teritory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Ternary;
use Illuminate\Support\Facades\Validator;

class TeritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teritory::all();
        return view('pages.teritory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.teritory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_teritories' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new Teritory();
            $data->name = $request->input('name');
            $data->code_teritories = $request->input('code_teritories');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = Teritory::find($id);

        if(!$data)
        {
            return redirect()->back();
        }

        return view('pages.teritory.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_teritories' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Teritory::find($id);

            if(!$data)
            {
                return redirect()->back();
            }

            $data->name = $request->input('name');
            $data->code_teritories = $request->input('code_teritories');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function destroy($id)
    {
        Teritory::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
