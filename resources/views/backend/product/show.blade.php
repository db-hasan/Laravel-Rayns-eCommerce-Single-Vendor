@extends('backend/layouts/layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>All Data</h4>
                        <div class="text-end">
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-3">
                            <label>ID:</label>
                            <h6>{{$showData->product_id}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>Category:</label>
                            <h6>{{$showData->category_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>SubCategory:</label>
                            <h6>{{$showData->subcategory_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>SubSubCategory:</label>
                            <h6>{{$showData->subsubcategory_name}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">
                            <label>Brand:</label>
                            <h6>{{$showData->brand_name}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>Color:</label>
                            <h6>{{$showData->color_name}}</h6>
                        </div>
                        <div class="col-md-6">
                            <label>Product name:</label>
                            <h6>{{$showData->product_name}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">
                            <label>Buying Price:</label>
                            <h6>{{$showData->buying_price}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>Selling Price:</label>
                            <h6>{{$showData->selling_price}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>Product SKU:</label>
                            <h6>{{$showData->product_sku}}</h6>
                        </div>
                        <div class="col-md-3">
                            <label>Product Status:</label>
                            <h6>{{$showData->product_status}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        
                        <div class="col-md-12">
                            <label>Description:</label>
                            <h6>{{$showData->product_des}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-4 d-flex">
                            <div class="">
                                <label>Images:</label>
                                <h6>{{$showData->product_img}}</h6>
                            </div>
                            <div class="ps-2">
                                <img src="/images/{{$showData->product_img}}" alt="Image not found" style="height: 100px; width: 100px;" class="rounded">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection