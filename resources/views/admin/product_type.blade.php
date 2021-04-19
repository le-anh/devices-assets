@extends('layouts.master_admin')

@section('content')
<section class="panel panel-featured panel-featured-primary">
    <header class="panel-heading">
        <h2 class="panel-title">
            Product type list
            <div class="zalo-share-button" data-href="https://truecoffeeshop.com" data-oaid="579745863508352884"  data-color="blue" data-customize=false></div>
            <div class="fb-share-button" data-href="https://truecoffeeshop.com" >vsfv</div>

        </h2>
        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary btn-circle btn-float-bottom-right" href="#modalAdd"><i class="fa fa-plus"></i> </a>
    </header>

    <div class="panel-body">
        <table class="table table-striped mb-none data-table">
            <thead>
                <tr>
                    <td class="text-center"># &emsp;</td>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Note</td>
                    <td class="text-center"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($productTypeList ?? [] as $productType)
                <tr>
                    <td class="text-center align-items-center"> {{ $loop->iteration }} </td>
                    <td> {{ $productType->code ?? '' }} </td>
                    <td> {{ $productType->name ?? '' }} </td>
                    <td class="text-justify"> {!! $productType->note !!} </td>
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

<!-- Modal Product Type Add -->
<div id="modalAdd" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.product_type.store') }} " method="post">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Add product type</h2>
            </header>
            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Code</label>
                    <div class="col-sm-9">
                        <input type="text" name="code" class="form-control" value="{{old('code')}}" placeholder="Type code ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Type customer name ..." autofocus required>
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

<!-- Modal Product Type Details -->
<div id="modalDetail" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <section class="panel">
        <div class="panel-body">
            <div class="col-12">
                <header class="clearfix">
                    <div class="col-sm-8 mt-md">
                        <h3 class="h2 mt-none mb-sm text-dark text-bold"><span id="producttype_name"></span></h3>
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
                            <td>Code</td>
                            <th id="producttype_code"></th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <th id="producttype_name"></th>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <th id="producttype_note"></th>
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

<!-- Modal Product Type Edit -->
<div id="modalEdit" class="zoom-anim-dialog modal-block modal-block-lg modal-block-primary mfp-hide">
    <form action=" {{ route('admin.product_type.update') }} " method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="producttype_id" id="producttype_id_edit" value="">
        <section class="panel">
            <header class="panel-heading">
                <button type="button" class="close modal-dismiss" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="panel-title">Edit product type</h2>
            </header>
            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Code</label>
                    <div class="col-sm-9">
                        <input type="text" name="code" id="code_edit" class="form-control" value="{{old('code')}}" placeholder="Type code ..." autofocus>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name_edit" class="form-control" value="{{old('name')}}" placeholder="Type customer name ..." autofocus required>
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

<!-- Modal Product Type Delete -->
<div id="modalDelete" class="zoom-anim-dialog modal-block modal-block-danger mfp-hide">
    <form action=" {{ route('admin.customer.destroy') }} " method="post">
        @method('DELETE')
        @csrf
        <input type="hidden" name="producttype_id" id="producttype_id_delete" value="">
        <section class="panel">
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-icon center">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="modal-text center">
                        <h4>Are you sure?</h4>
                        <p>Are you sure that you want to delete this product type?</p>
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

    function Info(productType) {
        productType = JSON.parse(productType);
        $('#producttype_code').html(productType.code);
        $('#producttype_name').html(productType.name);
        $('#producttype_note').html(productType.note);
    }

    function Edit(productType) {
        productType = JSON.parse(productType);
        $('#producttype_id_edit').val(productType.id);
        $('#producttype_code_edit').val(productType.id);
        $('#producttype_name_edit').val(productType.id);
        editorNote_edit.setData(productType.note ?? '');
    }

    function Delete(productTypeId) {
        $('#producttype_id_delete').val(productTypeId);
    }
</script>
@endsection