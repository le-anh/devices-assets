<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_type');
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
        try {
            $productType = new ProductType();
            $productType->name = $request->name;
            $productType->note = $request->note;
            $productType->save();
            $productType->code = "T". $productType->id;
            $productType->save();
            return redirect()->route('admin.product_type.index')->with(['type' => 'primary', 'message' => "Save is successfully!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        try {
            $productType = ProductType::find($request->producttype_id);
            $productType->name = $request->name;
            $productType->note = $request->note;
            $productType->save();
            return redirect()->route('admin.product_type.inde')->with(['type' => 'primary', 'message' => "Save is successfully!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductType $productType)
    {
        try {
            ProductType::destroy($request->producttype_id);
            return redirect()->route('admin.product_type.inde')->with(['type' => 'primary', 'message' => "Delete is successfully!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
