<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id')->paginate(10);
        return view('pages.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:8|required',
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new User();
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->password = $request->input('password');
            $data->level = $request->input('level');
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);

        return view('pages.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'email|required',
        'password' => 'min:8|required',
        'level' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->messages(),
        ]);
    } else {
        // Check if the email is already taken by another user
        $existingUser = User::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($existingUser) {
            return response()->json([
                'status' => 400,
                'errors' => [
                    'email' => ['The email has already been taken by another user.']
                ],
            ]);
        }

        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email'); // Update the email if it's being changed
        $data->password = Hash::make($request->input('password'));
        $data->level = $request->input('level');
        $data->save();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->back();
    }
}
