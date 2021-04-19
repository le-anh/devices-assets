<?php

namespace App\Http\Controllers;

use App\Models\ProductWeight;
use Illuminate\Http\Request;

class ProductWeightController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductWeight  $productWeight
     * @return \Illuminate\Http\Response
     */
    public function show(ProductWeight $productWeight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductWeight  $productWeight
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductWeight $productWeight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductWeight  $productWeight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductWeight $productWeight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductWeight  $productWeight
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductWeight $productWeight)
    {
        //
    }

    public static function ProductWeight($productWeightId = '')
    {
        return ProductWeight::find($productWeightId);
    }
}
