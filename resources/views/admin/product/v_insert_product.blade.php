@extends('admin.v_template_admin');
@section('contentadmin')
<!-- general form elements -->
<div class="container-fluid">
	<div class="box box-primary" style="margin-top: 30px;">
		<div class="box-header with-border">
			<h3 class="box-title">Insert Data Product</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" action="{{route('insertproduct')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Image</label>
					<input name='image' type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Product Image" value="{{old('image')}}">
					@error('image')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Code</label>
					
					<input name='code' type="text" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Enter Product Code" value="">
					@error('code')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input name='name' type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Product Name" value="{{old('name')}}">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Varian</label>
					<input name='varian' type="text" class="form-control @error('varian') is-invalid @enderror" id="varian" placeholder="Enter Product Varian" value="{{old('varian')}}">
					@error('varian')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Stock</label>
					<input name='stock' type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter Product Stock" value="{{old('stock')}}">
					@error('stock')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				<div class="form-group">
					<label for="exampleInputPassword1">Category</label>
					<select class="form-control" name="category">
						@foreach ($categories as $cat)
						<option value="{{$cat->name}}">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Price</label>
					<input name='price' type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Enter Product Price" value="{{old('price')}}">
					@error('stock')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Deskripsi</label>
					<input name='description' type="text" class="form-control @error('stock') is-invalid @enderror" id="description" placeholder="Enter Product Deskripsi" value="{{old('description')}}">
					@error('stock')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<!-- 	<input name="category" type="text" class="form-control @error('category') is-invalid @enderror" id="category" placeholder="Enter Category" value="{{old('category')}}">
					@error('category')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror -->
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Insert</button>
			</div>
		</form>
	</div>	
</div>

@endsection