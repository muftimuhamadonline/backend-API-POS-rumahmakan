@extends('admin.v_template_admin');
@section('contentadmin')
<!-- general form elements -->
<div class="container-fluid">
	<div class="box box-primary" style="margin-top: 30px;">
		<div class="box-header with-border">
			<h3 class="box-title">Insert Data Page</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" action="{{route('insertpage')}}" method="post">
			@csrf
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input name='title' type="text" class="form-control @error('name') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{old('title')}}">
					@error('title')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Content</label>
					<input name="content" type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter Content" value="{{old('urutan')}}">
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