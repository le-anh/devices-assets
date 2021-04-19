@extends('layouts.master_admin')

@section('content')
<!-- <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary btn-circle btn-float-bottom-right" href="#modalAdd"><i class="fa fa-plus"></i> </a> -->
<div class="btn-group dropleft dropup btn-float-bottom-right">
    <button type="button" class="dropdown-toggle btn btn-primary btn-circle" data-toggle="dropdown" aria-expanded="false"> <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>
<div class="row">
    <section class="panel panel-transparent">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>
        </header>
        <div class="panel-body">
            <div class="col-md-6 col-lg-3 col-xl-3">
                <section class="panel panel-featured-left panel-featured-primary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Bills</h4>
                                    <div class="info">
                                        <strong class="amount"> {{ number_format($countBill ?? 0, 0, ",", ".") }} </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{route('admin.bill.index')}}" class="text-muted"> <i class="fa fa-info-circle"></i> Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <section class="panel panel-featured-left panel-featured-secondary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Orders</h4>
                                    <div class="info">
                                        <strong class="amount"> {{ number_format($countOrdering ?? 0, 0, ",", ".") }} </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{route('admin.order.index')}}" class="text-muted "> <i class="fa fa-info-circle"></i> Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <section class="panel panel-featured-left panel-featured-tertiary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fa fa-coffee"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Products</h4>
                                    <div class="info">
                                        <strong class="amount"> {{ number_format($countProduct ?? 0, 0, ",", ".") }} </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{route('admin.product.index')}}" class="text-muted "> <i class="fa fa-info-circle"></i> Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <section class="panel panel-featured-left panel-featured-warning">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-warning">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Customers</h4>
                                    <div class="info">
                                        <strong class="amount">{{ number_format($countCustomer ?? 0, 0, ",", ".") }}</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{route('admin.customer.index')}}" class="text-muted "> <i class="fa fa-info-circle"></i> Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </section>
</div>

<div class="row">
    <section class="panel panel-transparent">
        <div class="panel-body">
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalAddBill">
                    <section class="panel">
                        <header class="panel-heading bg-primary">
                            <div class="panel-heading-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <h3 class="text-semibold mt-sm text-center">Bill</h3>
                        </header>

                    </section>
                </a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalAddOrder">
                    <section class="panel">
                        <header class="panel-heading bg-secondary">
                            <div class="panel-heading-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <h3 class="text-semibold mt-sm text-center">Order</h3>
                        </header>

                    </section>
                </a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalAddProduct">
                    <section class="panel">
                        <header class="panel-heading bg-tertiary">
                            <div class="panel-heading-icon">
                                <i class="fa fa-coffee"></i>
                            </div>
                            <h3 class="text-semibold mt-sm text-center">Product</h3>
                        </header>
                    </section>
                </a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalAddCustomer">
                    <section class="panel">
                        <header class="panel-heading bg-warning">
                            <div class="panel-heading-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <h3 class="text-semibold mt-sm text-center">Customer</h3>
                        </header>
                    </section>
                </a>
            </div>
        </div>
    </section>
</div>

<div class="row">
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Sell</h2>
            </header>
            <div class="panel-body">
                <!-- Flot: Bars -->
                <div class="chart chart-md" id="flotBars"></div>
                <script>
                   
                    var flotBarsData = [
                        ["Jan", 28],
                        ["Feb", 42],
                        ["Mar", 25],
                        ["Apr", 23],
                        ["May", 37],
                        ["Jun", 33],
                        ["Jul", 18],
                        ["Aug", 14],
                        ["Sep", 18],
                        ["Oct", 15],
                        ["Nov", 50],
                        ["Dec", 75]
                    ];
                </script>
            </div>
        </section>
    </div>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Percentage of type product</h2>
            </header>
            <div class="panel-body">

                <!-- Flot: Pie -->
                <div class="chart chart-md" id="flotPie"></div>
                <script type="text/javascript">

                    var flotPieData = [{
                        label: "Arabica",
                        data: [
                            [1, 60]
                        ],
                        color: '#0088cc'
                    }, {
                        label: "Arabica-Robus-Culi (2-4-4)",
                        data: [
                            [1, 10]
                        ],
                        color: '#2baab1'
                    }, {
                        label: "Arabica-Robus (2-8)",
                        data: [
                            [1, 15]
                        ],
                        color: '#734ba9'
                    }, {
                        label: "Arabica-Robus (4-6)",
                        data: [
                            [1, 15]
                        ],
                        color: '#E36159'
                    }];
                </script>
            </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Basic Chart</h2>
                <p class="panel-subtitle">You don't have to do much to get an attractive plot. Create a placeholder, make sure it has dimensions (so Flot knows at what size to draw the plot), then call the plot function with your data.</p>
            </header>
            <div class="panel-body">

                <!-- Flot: Basic -->
                <div class="chart chart-md" id="flotBasic"></div>
                <script type="text/javascript">

                    var flotBasicData = [{
                        data: [
                            [0, 170],
                            [1, 169],
                            [2, 173],
                            [3, 188],
                            [4, 147],
                            [5, 113],
                            [6, 128],
                            [7, 169],
                            [8, 173],
                            [9, 128],
                            [10, 128]
                        ],
                        label: "Series 1",
                        color: "#0088cc"
                    }, {
                        data: [
                            [0, 115],
                            [1, 124],
                            [2, 114],
                            [3, 121],
                            [4, 115],
                            [5, 83],
                            [6, 102],
                            [7, 148],
                            [8, 147],
                            [9, 103],
                            [10, 113]
                        ],
                        label: "Series 2",
                        color: "#2baab1"
                    }, {
                        data: [
                            [0, 70],
                            [1, 69],
                            [2, 73],
                            [3, 88],
                            [4, 47],
                            [5, 13],
                            [6, 28],
                            [7, 69],
                            [8, 73],
                            [9, 28],
                            [10, 28]
                        ],
                        label: "Series 3",
                        color: "#734ba9"
                    }];

                    // See: assets/javascripts/ui-elements/examples.charts.js for more settings.

                </script>

            </div>
        </section>
    </div>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Real-Time Chart</h2>
                <p class="panel-subtitle">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
            </header>
            <div class="panel-body">

                <!-- Flot: Curves -->
                <div class="chart chart-md" id="flotRealTime"></div>

            </div>
        </section>
    </div>
</div>
<!-- Modal Bill Add -->
<div id="modalAddBill" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
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
                        <textarea rows="5" id="note_bill" name="note" class="form-control" placeholder="Type your note..." autofocus></textarea>
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

<!-- Modal Order Add -->
<div id="modalAddOrder" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.order.store') }} " method="post">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Add order</h2>
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
                    <label class="col-sm-3 control-label">Delivery date</label>
                    <div class="col-sm-9">
                        <input type="date" name="deliverydate" class="form-control" value="{{date('Y-m-d', strtotime(old('deliverydate', '+3 day')))}}" placeholder="Type your email..." autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="note_order" name="note" class="form-control" placeholder="Type your note..." autofocus></textarea>
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

<!-- Modal Product Add -->
<div id="modalAddProduct" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.order.store') }} " method="post">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Add order</h2>
            </header>
            <div class="panel-body">
                <h2>Chưa làm</h2>
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

<!-- Modal Customer Add -->
<div id="modalAddCustomer" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.customer.store') }} " method="post">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Add customer</h2>
            </header>
            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Type customer name ..." autofocus required>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label invalid">Acronym</label>
                    <div class="col-sm-9">
                        <input type="text" name="acronym" class="form-control" value="{{old('acronym')}}" placeholder="Type customer acronym ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Type phone ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Type email ..." autofocus>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea rows="3" name="address" class="form-control" placeholder="Type address..." autofocus>{{old('address')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="note_customer" name="note" class="form-control" placeholder="Type your note..." autofocus>{{old('note')}}</textarea>
                    </div>
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
@endsection

@section('javascript')
    <script>
        ClassicEditor
        .create( document.querySelector('#note_bill'))
        .catch( error => {
            console.error( error );
        });

        ClassicEditor
        .create( document.querySelector('#note_order'))
        .catch( error => {
            console.error( error );
        });

        ClassicEditor
        .create( document.querySelector('#note_customer'))
        .catch( error => {
            console.error( error );
        });


    </script>
@endsection