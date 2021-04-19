<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
    public static function store(Request $request, Order $order)
    {
        $subTotal = 0;
        try {
            foreach ($request->product as $key => $product_id) {
                if ($product_id && $product_id != "") {
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->productweight_id = $product_id;
                    $orderDetail->quantity = $request->quantity[$key] ?? '1';
                    $orderDetail->price = $request->price[$key] ?? 0;
                    $orderDetail->total = $request->total[$key] ?? 0;
                    $orderDetail->save();
                    $subTotal += floatval($orderDetail->total);
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
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, Order $order)
    {
        try {
            self::destroy($order->id);
            return self::store($request, $order);
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public static function destroy($orderId = '')
    {
        try {
            OrderDetail::where('order_id', $orderId)->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
