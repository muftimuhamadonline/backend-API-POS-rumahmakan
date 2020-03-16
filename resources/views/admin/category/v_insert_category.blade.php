@extends('admin.v_template_admin');
@section('contentadmin')
<!-- general form elements -->
<div class="container-fluid">
	<div class="box box-primary" style="margin-top: 30px;">
		<div class="box-header with-border">
			<h3 class="box-title">Insert Data Category</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" action="{{route('insertcategory')}}" method="post">
			@csrf
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input name='name' type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{old('name')}}">
					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Urutan</label>
					<input name="urutan" type="text" class="form-control @error('urutan') is-invalid @enderror" id="urutan" placeholder="Enter Category" value="{{old('urutan')}}">
					@error('urutan')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
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