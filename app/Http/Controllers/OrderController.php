<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderList = Order::where('status', 0)->orderBy('status', 'asc')->orderBy('deliverydate', 'asc')->orderBy('id', 'desc')->get();
        $productList = Product::all();
        $customerList = Customer::all();
        return view('admin.order_index', compact('orderList', 'productList', 'customerList'));
    }

    public function deliveredindex()
    {
        $orderList = Order::where('status', 1)->orderBy('status', 'asc')->orderBy('deliverydate', 'asc')->get();
        $productList = Product::all();
        $customerList = Customer::all();
        return view('admin.order_delivered_index', compact('orderList', 'productList', 'customerList'));
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
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->orderdate = date("Y-m-d", strtotime($request->orderdate ?? now()));
            $order->deliverydate = date("Y-m-d", strtotime($request->deliverydate ?? '+3 day'));
            $order->pay = $request->pay;
            $order->debit = $request->debit;
            $order->note = $request->note;
            $order->save();
            $subTotal = OrderDetailController::store($request, $order);
            $order->code = date('Ymd', strtotime($order->orderdate)) . $order->id;
            $order->total = $subTotal;
            $order->save();
            return redirect()->route('admin.order.index')->with(['type' => 'primary', 'message' => "Save is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try {
            $order = Order::find($request->order_id_edit);
            $order->customer_id = $request->customer_id;
            $order->deliverydate = date("Y-m-d", strtotime($request->deliverydate ?? '+3 day'));
            $order->pay = $request->pay;
            $order->debit = $request->debit;
            $order->note = $request->note;
            $subTotal = OrderDetailController::update($request, $order);
            $order->total = $subTotal;
            $order->save();
            return redirect()->route('admin.order.index')->with(['type' => 'primary', 'message' => "Save is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function delivered(Request $request, Order $order)
    {
        try {
            Order::find($request->order_id)->update(['status' => 1]);
            BillController::storefromorder($request, $order);
            return redirect()->route('admin.order.index')->with(['type' => 'primary', 'message' => "Save is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            OrderDetailController::destroy($request->order_id);
            Order::destroy($request->order_id);
            return redirect()->route('admin.order.index')->with(['type' => 'primary', 'message' => "Delete is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
