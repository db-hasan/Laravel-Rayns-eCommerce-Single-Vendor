
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Brand</th>
                    <th>Unit</th>
                    <th>Color</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>SKU</th>
                    <th>Status</th>
                    <th class="ps-5">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indexproduct as $itemproduct)
                <tr>
                    <td>{{$itemproduct->product_id}}</td> 
                    <td>{{$itemproduct->category_name}}</td> 
                    <td>{{$itemproduct->subcategory_name}}</td> 
                    <td>{{$itemproduct->brand_name}}</td> 
                    <td>{{$itemproduct->unit_name}}</td> 
                    <td>{{$itemproduct->color_name}}</td> 
                    <td>{{$itemproduct->product_name}}</td> 
                    <td>{{$itemproduct->product_des}}</td> 
                    <td>{{$itemproduct->product_sku}}</td> 
                    <td>{{$itemproduct->status_name}}</td> 
                    <td class="icons">
                        <a href="{{ route('product.show', $itemproduct->product_id) }}" type="button"  class="btn view"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('product.edit', $itemproduct->product_id) }}" type="button" class="btn edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('product.destroy', $itemproduct->product_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>
@endsection