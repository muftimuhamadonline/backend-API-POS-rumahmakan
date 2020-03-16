@extends('admin.template')

@section('contentadmin')
<div class="col-md-6">
    <div class="content container-fluid">
                <h3 class="box-title">Data Category</h3>
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Add Category
                </button>
            </div>
            <!-- modal -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form role="form" action="{{route('storecategory')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title">Input data Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input name="category" type="text" class="form-control" id="category" placeholder="Enter Category">
                        </div>
                        <div class="box-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Urutan</label>
                            <input name="urutan" type="number" class="form-control" id="urutan" placeholder="Enter Urutan">
                        </div>



                    </div>
                    <!-- /.box-body -->


                </div>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
              <button type="submit"  class="btn btn-primary">Save changes</button>
          </div>
      </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- endmodal -->
<!-- /.box-header -->
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Urutan</th>               
                <th style="text-align: center;">Aksi</th>               
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $c)    
            <tr>
                <td style="text-align: center;">{{$loop->iteration}}</td>
                <td style="text-align: center;">{{$c->category}}</td>
                <td style="text-align: center;">{{$c->urutan}}</td>
                <td style="text-align: center;">
                    <a href="" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></a>
                        <a href="/dashboard/deletecategory/{{$c->id}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</div>
@endsection