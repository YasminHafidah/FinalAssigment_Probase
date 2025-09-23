<?php

namespace App\Http\Controllers;

use App\Models\TheoryValidation;
use Illuminate\Http\Request;

class TheoryValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validation = TheoryValidation::all();

        return view('validasiProgress', ['validasi' => $validation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(TheoryValidation $theoryValidation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TheoryValidation $theoryValidation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TheoryValidation $theoryValidation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TheoryValidation $theoryValidation)
    {
        //
    }
}
