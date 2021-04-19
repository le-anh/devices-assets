@extends('layouts.master_admin')

@section('content')
<section class="panel panel-featured panel-featured-primary">
    <header class="panel-heading">
        <h2 class="panel-title">
            Bill list
        </h2>
        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary btn-circle btn-float-bottom-right" href="#modalAdd"><i class="fa fa-plus"></i> </a>
    </header>

    <div class="panel-body">
        <table class="table table-striped mb-none data-table">
            <thead>
                <tr>
                    <td class="text-center"># &emsp;</td>
                    <td class="text-center">Date</td>
                    <td>Customer</td>
                    <td>Details</td>
                    <td class="text-right">Total</td>
                    <td class="text-right">Pay</td>
                    <td class="text-right">Debit</td>
                    <td class="text-center"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($billList ?? [] as $bill)
                <tr>
                    @php
                    $arrDetail = [];
                    $details = $bill->billdetail ?? [];
                    foreach($details as $key => $detail)
                    {
                        $productWeight = App\Http\Controllers\ProductWeightController::ProductWeight($detail['productweight_id']);
                        $arr = $detail->toArray();
                        $arr += array('productname' => $detail->productweight->product->name, 'weight' => $detail->productweight->weight);
                        array_push($arrDetail, $arr);
                    }
                    @endphp
                    <td class="text-center align-items-center"> {{ $loop->iteration }} </td>
                    <td class="text-center"> {{ $bill->date ? date('d/m/Y', strtotime($bill->date)) : '' }} </td>
                    <td> {{ $bill->customer->name ?? '' }} </td>
                    <td class="align-middle">
                        @foreach($bill->billdetail ?? [] as $detail)
                            <strong> {{ $detail->productweight->product->name ?? ''}} </strong> -
                            {{ $detail->productweight->weight ?? ''}} gr - SL
                            {{ $detail->quantity ?? '1'}}
                            @if($loop->iteration < count($bill->billdetail ?? [])) <br> @endif
                        @endforeach
                    </td>
                    <td class="text-right"> {{ number_format($bill->total, 0, "," , ".") }} </td>
                    <td class="text-right"> {{ number_format($bill->pay, 0, "," , ".") }} </td>
                    <td class="text-right"> {{ number_format($bill->debit, 0, "," , ".") }} </td>
                    <td class="text-center">
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" href="#modalDetail" onclick="Info('{{ $bill ?? [] }}', '{{ json_encode($arrDetail ?? [])}}', '{{ $bill->customer ?? [] }}'); return false;"> <i class="fa fa-info-circle"></i> </a>
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-warning" href="#modalEdit" onclick="Edit('{{ $bill ?? [] }}', '{{ json_encode($arrDetail ?? [])}}'); return false;"> <i class="fa fa-pencil"></i> </a>
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-danger" href="#modalDelete" onclick="Delete('{{ $bill->id ?? [] }}'); return false;"> <i class="fa fa-trash-o"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Bill Add -->
<div id="modalAdd" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.bill.store') }} " method="post">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Add bill</h2>
            </header>
            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <select name="customer_id" id="customer_id" class="form-control" autofocus required>
                            <option value=""> --- Select customer --- </option>
                            @foreach($customerList ?? [] as $customer)
                            <option value="{{$customer->id}}"> {{ $customer->name }} {{ $customer->acronym ? ('('. $customer->acronym . ')') : '' }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" value="{{date('Y-m-d', strtotime(old('deliverydate', now())))}}" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="note" id="note" class="form-control" placeholder="Type your note..." autofocus></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="text-center">#</td>
                                <td class="align-middle">Product</td>
                                <td class="text-right">Quantity</td>
                                <td class="text-right">Price</td>
                                <td class="text-right">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i < 10; $i++) <tr>
                                <td class="text-center"> {{ $i }} </td>
                                <td class="align-middle">
                                    <select name="product[]" id="product{{$i}}" class="form-control">
                                        <option value=""> --- Select product --- </option>
                                        @foreach($productList ?? [] as $product)
                                        @foreach($product->productweight ?? [] as $weight)
                                        <option value="{{$weight->id}}"> {{ $product->name }} ({{ $weight->weight }} gr) </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-right">
                                    <input type="text" name="quantity[]" value="1" class="text-right form-control">
                                </td>
                                <td class="text-right">
                                    <input type="text" name="price[]" value="180000" class="text-right form-control">
                                </td>
                                <td class="text-right"> <input type="text" name="total[]" value="180000" class="text-right form-control"> </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary ">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>

<!-- Modal Bill Details -->
<div id="modalDetail" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <section class="panel">
        <div class="panel-body">
            <div class="invoice">
                <header class="clearfix">
                    <div class="row">
                        <div class="col-sm-2 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold">Bill</h2>
                            <h4 class="h4 m-none text-dark text-bold">#<span id="billcode"></span></h4>
                        </div>
                        <div class="col-sm-10 text-right mt-md mb-md">
                            <address class="ib mr-xlg">
                                True Coffee
                                <br />
                                8E Võ Thị Sáu, P.Đông Xuyên, TP.Long Xuyên, An Giang, Việt Nam
                                <br />
                                Phone: +84 9 1402-9627
                                <br />
                                truecoffee.vn@gmail.com
                            </address>
                            <div class="ib">
                                <img src="{{URL::asset('resources/assets/images/invoice-logo.png')}}" alt="True Coffee" />
                            </div>
                        </div>
                    </div>
                </header>
                <div class="bill-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p class="h5 mb-xs text-dark text-semibold"><span id="customername"></span></p>
                                <address>
                                    Address: <span id="customeraddress"></span>
                                    <br />
                                    Phone: <span id="customerphone"></span>
                                    <br />
                                    Email: <span id="customeremail"></span>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bill-data text-right">
                                <p class="mb-none">
                                    <span class="text-dark">Date:</span>
                                    <strong> <span class="value" id="date"> </span> </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table invoice-items">
                        <thead>
                            <tr class="h4 text-dark">
                                <th id="cell-id" class="text-semibold">#</th>
                                <th id="cell-item" class="text-semibold">Product</th>
                                <th id="cell-qty" class="text-right text-semibold">Quantity</th>
                                <th id="cell-price" class="text-right text-semibold">Price</th>
                                <th id="cell-total" class="text-right text-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-detail">
                        </tbody>
                    </table>
                </div>

                <div class="invoice-summary">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table h5 text-dark">
                                <tbody>
                                    <tr class="h4 b-top-none">
                                        <td colspan="2">Grand Total</td>
                                        <td class="text-right"><span id="grandTotal"> ### </span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Pay</td>
                                        <td class="text-right"><span id="pay"> ### </span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Debit</td>
                                        <td class="text-right"><span id="debit"> ### </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<!-- Modal Bill Edit -->
<div id="modalEdit" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.bill.update') }} " method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="bill_id" id="bill_id_edit" value="">
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Edit bill</h2>
            </header>
            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <select name="customer_id" id="customer_id_edit" class="form-control" autofocus required>
                            <option value=""> --- Select customer --- </option>
                            @foreach($customerList ?? [] as $customer)
                            <option value="{{$customer->id}}"> {{ $customer->name }} {{ $customer->acronym ? ('('. $customer->acronym . ')') : '' }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="date" id="date_edit" class="form-control" value="{{date('Y-m-d', strtotime(old('date', now())))}}" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="note" id="note_edit" class="form-control" placeholder="Type your note..." autofocus></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="text-center">#</td>
                                <td class="align-middle">Product</td>
                                <td class="text-right">Quantity</td>
                                <td class="text-right">Price</td>
                                <td class="text-right">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i < 10; $i++) <tr>
                                <td class="text-center"> {{ $i }} </td>
                                <td class="align-middle">
                                    <select name="product[]" id="product_edit{{$i}}" class="form-control">
                                        <option value=""> --- Select product --- </option>
                                        @foreach($productList ?? [] as $product)
                                        @foreach($product->productweight ?? [] as $weight)
                                        <option value="{{$weight->id}}"> {{ $product->name }} ({{ $weight->weight }} gr) </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-right">
                                    <input type="text" name="quantity[]" id="quantity_edit{{$i}}" value="1" class="text-right form-control">
                                </td>
                                <td class="text-right">
                                    <input type="text" name="price[]" id="price_edit{{$i}}" value="180000" class="text-right form-control">
                                </td>
                                <td class="text-right">
                                    <input type="text" name="total[]" id="total_edit{{$i}}" value="180000" class="text-right form-control">
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary ">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>

<!-- Modal Bill Delete -->
<div id="modalDelete" class="zoom-anim-dialog modal-block modal-block-danger mfp-hide">
    <form action=" {{ route('admin.bill.destroy') }} " method="post">
        @method('DELETE')
        @csrf
        <input type="hidden" name="bill_id" id="bill_id_delete" value="">
        <section class="panel">
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-icon center">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="modal-text center">
                        <h4>Are you sure?</h4>
                        <p>Are you sure that you want to delete this bill?</p>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-danger">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>
@endsection
@section('javascript')
<script>
    let editorNote;
    let editorNote_edit;
    ClassicEditor
        .create( document.querySelector('#note'))
        .then( newEditor => {
            editorNote = newEditor;
        })
        .catch( error => {
            console.error( error );
        });
    ClassicEditor
        .create( document.querySelector('#note_edit'))
        .then( newEditor => {
            editorNote_edit = newEditor;
        })
        .catch( error => {
            console.error( error );
        });

    function Info(bill, billDetail, customer) {
        customer = JSON.parse(customer);
        bill = JSON.parse(bill);
        billDetail = JSON.parse(billDetail);
        $('#billcode').html(bill.code);
        $('#customername').html(customer.name);
        $('#customeraddress').html(customer.address);
        $('#customerphone').html(customer.phone);
        $('#customeremail').html(customer.email);
        $('#date').html(bill.date);
        $('#grandTotal').html(bill.total ?? "###");
        $('#pay').html(bill.pay ?? "###");
        $('#debit').html(bill.debit ?? "###");
        $('#tbody-detail').html('');
        $.each(billDetail, function(index, value) {
            console.log(value);
            row = '<tr> <td>' + (index + 1) + '</td> <td class="text-semibold text-dark">' + value.productname + ' (' + value.weight + 'gr) ' + '</td> <td class="text-right"> ' + value.quantity + ' </td> <td class="text-right"> ' + value.price + ' </td> <td class="text-right"> ' + value.total + ' </td> </tr>';
            $('#tbody-detail').append(row);
        });
    }

    function Edit(bill, billDetail) {
        bill = JSON.parse(bill);
        billDetail = JSON.parse(billDetail);
        console.log(billDetail);
        $('#bill_id_edit').val(bill.id);
        $('#customer_id_edit').val(bill.customer_id);
        $('#date_edit').val(bill.date);
        editorNote_edit.setData(bill.note ?? '');
        $.each(billDetail, function(index, value) {
            $('#product_edit' + (index + 1)).val(value.productweight_id);
            $('#price_edit' + (index + 1)).val(value.price);
            $('#quantity_edit' + (index + 1)).val(value.quantity);
            $('#total_edit' + (index + 1)).val(value.total);
        });
    }

    function Delete(billId) {
        $('#bill_id_delete').val(billId);
    }
</script>
@endsection