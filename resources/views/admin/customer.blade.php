@extends('layouts.master_admin')

@section('content')
<section class="panel panel-featured panel-featured-primary">
    <header class="panel-heading">
        <h2 class="panel-title">
            Customer list
        </h2>
        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary btn-circle btn-float-bottom-right" href="#modalAdd"><i class="fa fa-plus"></i> </a>
    </header>

    <div class="panel-body">
        <table class="table table-striped mb-none data-table">
            <thead>
                <tr>
                    <td class="text-center"># &emsp;</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Note</td>
                    <td class="text-center"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($customerList ?? [] as $customer)
                <tr>
                    <td class="text-center align-items-center"> {{ $loop->iteration }} </td>
                    <td> {{ $customer->name ?? '' }}{{ $customer->acronym ? " (" . $customer->acronym . ")" : '' }} </td>
                    <td> {{ $customer->phone ?? '' }} </td>
                    <td> {{ $customer->email ?? '' }} </td>
                    <td> {!! $customer->address ?? '' !!} </td>
                    <td class="text-justify"> {!! $customer->note !!} </td>
                    <td class="text-center">
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" href="#modalDetail" onclick="Info('{{ $customer ?? [] }}'); return false;"> <i class="fa fa-info-circle"></i> </a>
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-warning" href="#modalEdit" onclick="Edit('{{ $customer ?? [] }}'); return false;"> <i class="fa fa-pencil"></i> </a>
                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-danger" href="#modalDelete" onclick="Delete('{{ $customer->id ?? [] }}'); return false;"> <i class="fa fa-trash-o"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Customer Add -->
<div id="modalAdd" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
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
                        <textarea rows="3" id="address" name="address" class="form-control editor" placeholder="Type address..." autofocus>{{old('address')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" id="note" name="note" class="form-control editor" placeholder="Type your note..." autofocus>{{old('note')}}</textarea>
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

<!-- Modal Customer Details -->
<div id="modalDetail" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <section class="panel">
        <div class="panel-body">
            <div class="col-12">
                <header class="clearfix">
                    <div class="col-sm-8 mt-md">
                        <h3 class="h2 mt-none mb-sm text-dark text-bold"><span id="customername"></span></h3>
                    </div>
                    <div class="col-sm-4 text-right mt-md mb-md">
                        <div class="ib">
                            <img src="{{URL::asset('resources/assets/images/truecoffee.png')}}" alt="True Coffee" width="48px;" />
                        </div>
                    </div>
                </header>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Acronym</td>
                            <th id="customeracronym"></th>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <th id="customerphone"></th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <th id="customeremail"></th>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <th id="customeraddress"></th>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <th id="customernote"></th>
                        </tr>
                    </tbody>
                </table>
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

<!-- Modal Customer Edit -->
<div id="modalEdit" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.customer.update') }} " method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="customer_id" id="customer_id_edit" value="">
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Edit customer</h2>
            </header>
            <div class="panel-body">
            <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name_edit" class="form-control" value="{{old('name')}}" placeholder="Type customer name ..." autofocus required>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label invalid">Acronym</label>
                    <div class="col-sm-9">
                        <input type="text" name="acronym" id="acronym_edit" class="form-control" value="{{old('acronym')}}" placeholder="Type customer acronym ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" id="phone_edit" class="form-control" value="{{old('phone')}}" placeholder="Type phone ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" id="email_edit" class="form-control" value="{{old('email')}}" placeholder="Type email ..." autofocus>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea rows="3" name="address" id="address_edit" class="form-control" placeholder="Type address..." autofocus>{{old('address')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="note" id="note_edit" class="form-control" placeholder="Type your note..." autofocus>{{old('note')}}</textarea>
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

<!-- Modal Customer Delete -->
<div id="modalDelete" class="zoom-anim-dialog modal-block modal-block-danger mfp-hide">
    <form action=" {{ route('admin.customer.destroy') }} " method="post">
        @method('DELETE')
        @csrf
        <input type="hidden" name="customer_id" id="customer_id_delete" value="">
        <section class="panel">
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-icon center">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="modal-text center">
                        <h4>Are you sure?</h4>
                        <p>Are you sure that you want to delete this customer?</p>
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
    let editorAddress;
    let editorNote;
    let editorAddress_edit;
    let editorNote_edit;

    ClassicEditor
        .create( document.querySelector('#address'))
        .catch( error => {
            console.error( error );
        });

    ClassicEditor
        .create( document.querySelector('#note'))
        .catch( error => {
            console.error( error );
        });
    
    ClassicEditor
        .create( document.querySelector('#address_edit'))
        .then( newEditor => {
            editorAddress_edit = newEditor;
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

    function Info(customer) {
        customer = JSON.parse(customer);
        $('#customername').html(customer.name);
        $('#customeracronym').html(customer.acronym);
        $('#customeraddress').html(customer.address);
        $('#customerphone').html(customer.phone);
        $('#customeremail').html(customer.email);
        $('#customernote').html(customer.note);
    }

    function Edit(customer) {
        customer = JSON.parse(customer);
        $('#customer_id_edit').val(customer.id);
        $('#name_edit').val(customer.name);
        $('#acronym_edit').val(customer.acronym);
        $('#phone_edit').val(customer.phone);
        $('#email_edit').val(customer.email);
        editorAddress_edit.setData(customer.address ?? '');
        editorNote_edit.setData(customer.note ?? '');
    }

    function Delete(customerId) {
        $('#customer_id_delete').val(customerId);
    }
</script>
@endsection