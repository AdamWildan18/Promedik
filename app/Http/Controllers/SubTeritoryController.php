<?php

namespace App\Http\Controllers;

use App\Models\SubTeritory;
use Illuminate\Http\Request;

class SubTeritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sub_teritory.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubTeritory $subTeritory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubTeritory $subTeritory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubTeritory $subTeritory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubTeritory $subTeritory)
    {
        //
    }
}
