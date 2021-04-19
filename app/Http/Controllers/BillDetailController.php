<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;

class BillDetailController extends Controller
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
    public static function store(Request $request, Bill $bill)
    {
        $subTotal = 0;
        try {
            foreach ($request->product ?? [] as $key => $product_id) {
                if ($product_id && $product_id != "") {
                    $billDetail = new BillDetail();
                    $billDetail->bill_id = $bill->id;
                    $billDetail->productweight_id = $product_id;
                    $billDetail->quantity = $request->quantity[$key] ?? '1';
                    $billDetail->price = $request->price[$key] ?? 0;
                    $billDetail->total = $request->total[$key] ?? 0;
                    $billDetail->save();
                    $subTotal += floatval($billDetail->total);
                }
            }
        } catch (\Throwable $th) {
            return false;
        }
        return $subTotal;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BillDetail $billDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BillDetail $billDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, Bill $bill)
    {
        try {
            self::destroy($bill->id);
            return self::store($request, $bill);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public static function destroy($billId = '')
    {
        try {
            BillDetail::where('bill_id', $billId)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
