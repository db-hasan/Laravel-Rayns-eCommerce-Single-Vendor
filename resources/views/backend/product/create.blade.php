@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" class="row g-3 p-3">
      @csrf

      <div class="col-md-4">
        <label for="category_name" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select example" name="category_name" id="category">
          <option value="">Sclect One</option>
          @foreach ($indexcategory as $itemcategory)
          <option value="{{$itemcategory->category_id}}">{{$itemcategory->category_name}}</option>
          @endforeach
        </select>
        @error('category_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-4">
        <label for="subcategory_name" class="form-label">SubCategory</label>
        <select class="form-select" aria-label="Default select example" name="subcategory_name" id="subcategory">
          <option value="">Sclect One</option>
        </select>
        @error('subcategory_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4">
        <label for="subsubcategory_name" class="form-label">SubSubCategory</label>
        <select class="form-select" aria-label="Default select example" name="subsubcategory_name" id="subsubcategory">
          <option value="">Sclect One</option>
        </select>
        @error('subsubcategory_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="brand_name" class="form-label">Brand</label>
        <select class="form-select" aria-label="Default select example" id="brand_name" name="brand_name">
          <option value="">Sclect One</option>
          @foreach ($indexbrand as $itembrand)
          <option value="{{$itembrand->brand_id}}">{{$itembrand->brand_name}}</option>
          @endforeach
        </select>
        @error('brand_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="color_name" class="form-label">Color</label>
        <select class="form-select" aria-label="Default select example" id="color_name" name="color_name">
          <option value="">Sclect One</option>
          @foreach ($indexcolor as $itemcolor)
          <option value="{{$itemcolor->color_id}}">{{$itemcolor->color_name}}</option>
          @endforeach
        </select>
        @error('color_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-6 pb-3">
        <label for="product_name" class="form-label">Product Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}">
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="col-md-4 pb-3">
        <label for="product_sku" class="form-label">Product SKU<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_sku" name="product_sku" value="{{old('product_sku')}}">
        @error('product_sku')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="buying_price" class="form-label">Buying Price<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_sku" name="buying_price" value="{{old('buying_price')}}">
        @error('buying_price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="selling_price" class="form-label">Selling Price<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{old('selling_price')}}">
        @error('selling_price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      

      <div class="col-md-12 pb-3">
        <label for="product_des" class="form-label">Product Description<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_des" name="product_des" value="{{old('product_des')}}">
        @error('product_des')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      {{-- <div class="col-md-12 pb-3">
        <textarea class="form-control" id="product_des" name="product_des" value="{{old('product_des')}}" style="height: 100px" placeholder="Product Description"></textarea>
        @error('product_des')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div> --}}

      <div class="col-md-4">
        <input type="file" class="form-control" id="product_img" name="product_img" value="{{old('product_des')}}">
        @error('product_img')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

		<script>
		jQuery(document).ready(function(){
			jQuery('#category').change(function(){
				let cate_id=jQuery(this).val();
				jQuery('#subsubcategory').html('<option value="">Select City</option>')
				jQuery.ajax({
					url:'/subcategory',
					type:'post',
					data:'cate_id='+cate_id+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#subcategory').html(result)
					}
				});
			});
			
			jQuery('#subcategory').change(function(){
				let sub_id=jQuery(this).val();
				jQuery.ajax({
					url:'/subsubcategory',
					type:'post',
					data:'sub_id='+sub_id+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#subsubcategory').html(result)
					}
				});
			});
			
		});
			
		</script>


@endsection