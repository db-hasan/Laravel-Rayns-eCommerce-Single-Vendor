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
                            <a href="{{ route('subcategory.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6">
                            <label>ID:</label>
                            <h6>{{$showData->subcategory_id}}</h6>
                        </div>
                        <div class="col-md-6">
                            <label>Name:</label>
                            <h6>{{$showData->category_name}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-6">
                            <label>ID:</label>
                            <h6>{{$showData->subcategory_name}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a href="{{ route('subcategory.index') }}" class="btn btn-sm btn-dark">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection