<?php

namespace App\Http\Controllers;

use App\Models\Teritory;
use Illuminate\Http\Request;

class TeritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.teritory.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teritory $teritory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teritory $teritory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teritory $teritory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teritory $teritory)
    {
        //
    }
}
