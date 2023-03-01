<?php

namespace App\Http\Controllers;

use App\Models\PopularIngredient;
use App\Http\Requests\StorePopularIngredientRequest;
use App\Http\Requests\UpdatePopularIngredientRequest;

class PopularIngredientController extends Controller
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
     * @param  \App\Http\Requests\StorePopularIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePopularIngredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PopularIngredient  $popularIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(PopularIngredient $popularIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PopularIngredient  $popularIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(PopularIngredient $popularIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePopularIngredientRequest  $request
     * @param  \App\Models\PopularIngredient  $popularIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePopularIngredientRequest $request, PopularIngredient $popularIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PopularIngredient  $popularIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopularIngredient $popularIngredient)
    {
        //
    }
}
