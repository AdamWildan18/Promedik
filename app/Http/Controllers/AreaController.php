<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index()
    {
        $data = Area::all();
        return view('pages.area.index', compact('data'));
    }

    public function create()
    {
        return view('pages.area.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_area' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new Area();
            $data->name = $request->input('name');
            $data->code_area = $request->input('code_area');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = Area::find($id);

        if(!$data)
        {
            return redirect()->back();
        }

        return view('pages.area.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_area' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Area::find($id);

            if(!$data)
            {
                return redirect()->back();
            }

            $data->name = $request->input('name');
            $data->code_area = $request->input('code_area');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function destroy($id)
    {
        Area::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
