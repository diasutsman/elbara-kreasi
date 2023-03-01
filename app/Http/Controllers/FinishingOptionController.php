<?php

namespace App\Http\Controllers;

use App\Models\FinishingOption;
use App\Http\Requests\StoreFinishingOptionRequest;
use App\Http\Requests\UpdateFinishingOptionRequest;

class FinishingOptionController extends Controller
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
     * @param  \App\Http\Requests\StoreFinishingOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinishingOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function show(FinishingOption $finishingOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function edit(FinishingOption $finishingOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinishingOptionRequest  $request
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinishingOptionRequest $request, FinishingOption $finishingOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinishingOption $finishingOption)
    {
        //
    }
}
