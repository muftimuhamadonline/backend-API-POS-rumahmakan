@extends('admin.v_template_admin');
@section('contentadmin')
<!-- general form elements -->
<div class="container-fluid">
	<div class="box box-primary" style="margin-top: 30px;">
		<div class="box-header with-border">
			<h3 class="box-title">Update Data Category</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form  role="form" action="{{route('updatecategory', ['id'=>$cats->id])}}" method="post">
			@csrf
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input name='name' type="text" class="form-control @error('name') is-invalid @enderror" id="name"
					value="{{ $cats->name }}" placeholder="Enter Name">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Urutan</label>
					<input name="urutan" type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Enter Category" value="{{ $cats->urutan }}">
					@error('urutan')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>	
</div>

@endsection