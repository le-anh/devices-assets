<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billList = Bill::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        $productList = Product::all();
        $customerList = Customer::all();
        return view('admin.bill_index', compact('billList', 'productList', 'customerList'));
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
    public function store(Request $request, Order $order)
    {
        try {
            $bill = new Bill();
            $bill->customer_id = $request->customer_id;
            $bill->date = date("Y-m-d", strtotime($request->date ?? now()));
            $bill->debit = $request->debit ?? 0;
            $bill->note = $request->note;
            $bill->save();
            $subTotal = BillDetailController::store($request, $bill);
            $bill->code = date('Ymd', strtotime($bill->date)) . $bill->id;
            $bill->total = $subTotal;
            $bill->pay = $request->pay ?? (($subTotal - $request->debit) > 0 ? ($subTotal - $request->debit) : 0 );
            $bill->save();
            return redirect()->route('admin.bill.index')->with(['type'=>'primary', 'message' => "Save is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type'=>'error', 'message' => $th->getMessage()]);
        }
    }

    public static function storefromorder(Request $request, Order $order)
    {
        try {
            $bill = new Bill();
            $bill->order_id = $order->id ?? null;
            $bill->customer_id = $request->customer_id;
            $bill->date = date("Y-m-d", strtotime($request->date ?? now()));
            $bill->total = $request->grandtotal ?? 0;
            $bill->pay = $request->pay ?? 0;
            $bill->debit = $request->debit ?? 0;
            $bill->note = $request->note;
            $bill->save();
            $subTotal = BillDetailController::store($request, $bill);
            $bill->code = date('Ymd', strtotime($bill->date)) . $bill->id;
            $bill->total = $subTotal;
            $bill->pay = $request->pay ?? (($subTotal - $request->debit) > 0 ? ($subTotal - $request->debit) : 0 );
            $bill->save();
        } catch (\Throwable $th) {
        }
        return '';
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        try {
            $bill = Bill::find($request->bill_id);
            $bill->customer_id = $request->customer_id;
            $bill->date = date("Y-m-d", strtotime($request->deliverydate ?? now()));
            $bill->total = $request->grandtotal ?? 0;
            $bill->pay = $request->pay ?? 0;
            $bill->debit = $request->debit ?? 0;
            $bill->note = $request->note;
            $bill->save();
            $subTotal = BillDetailController::update($request, $bill);
            $bill->total = $subTotal;
            $bill->pay = $request->pay ?? (($subTotal - $request->debit) > 0 ? ($subTotal - $request->debit) : 0 );
            $bill->save();
            return redirect()->route('admin.bill.index')->with(['type' => 'primary', 'message' => "Save is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            BillDetailController::destroy($request->bill_id);
            Bill::destroy($request->bill_id);
            return redirect()->route('admin.bill.index')->with(['type' => 'primary', 'message' => "Delete is successful!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
