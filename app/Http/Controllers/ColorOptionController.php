<?php

namespace App\Http\Controllers;

use App\Models\ColorOption;
use App\Http\Requests\StoreColorOptionRequest;
use App\Http\Requests\UpdateColorOptionRequest;

class ColorOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColorOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ColorOption  $colorOption
     * @return \Illuminate\Http\Response
     */
    public function show(ColorOption $colorOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ColorOption  $colorOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorOption $colorOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorOptionRequest  $request
     * @param  \App\Models\ColorOption  $colorOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColorOptionRequest $request, ColorOption $colorOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ColorOption  $colorOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorOption $colorOption)
    {
        //
    }
}
