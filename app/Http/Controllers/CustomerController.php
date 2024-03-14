<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::all();

        return view('pages.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_customer' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'specialist' => 'required',
            'hari' => 'required',
            'jam' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new Customer();
            $data->name = $request->input('name');
            $data->code_customer = $request->input('code_customer');
            $data->gender = $request->input('gender');
            $data->address = $request->input('address');
            $data->specialist = $request->input('specialist');
            $data->hari = $request->input('hari');
            $data->jam = $request->input('jam');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = Customer::find($id);

        if(!$data)
        {
            return redirect()->back();
        }

        return view('pages.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code_customer' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'specialist' => 'required',
            'hari' => 'required',
            'jam' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Customer::find($id);

            if(!$data)
            {
                return redirect()->back();
            }

            $data->name = $request->input('name');
            $data->code_customer = $request->input('code_customer');
            $data->gender = $request->input('gender');
            $data->address = $request->input('address');
            $data->specialist = $request->input('specialist');
            $data->hari = $request->input('hari');
            $data->jam = $request->input('jam');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
