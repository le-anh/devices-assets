<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerList = Customer::all();
        return view('admin.customer', compact('customerList'));
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
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->acronym = $request->acronym;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->note = $request->note;
            $customer->save();
            $customer->code = "KH".$customer->id;
            $customer->save();
            return redirect()->route('admin.customer.index')->with(['type' => 'primary', 'message' => "Save is successfully!"]);

        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $customer = Customer::find($request->customer_id);
            $customer->name = $request->name;
            $customer->acronym = $request->acronym;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->note = $request->note;
            $customer->save();
            return redirect()->route('admin.customer.index')->with(['type' => 'primary', 'message' => "Save is successfully!"]);

        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customer $customer)
    {
        try {
            Customer::destroy($request->customer_id);
            return redirect()->route('admin.customer.index')->with(['type' => 'primary', 'message' => "Delete is successfully!"]);

        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
