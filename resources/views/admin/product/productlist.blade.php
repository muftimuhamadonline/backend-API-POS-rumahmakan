        @extends('admin.template')

        @section('contentadmin')
        <div class="content container-fluid">
          <h3 class="box-title">Data Product</h3>
          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add Products
              </button>
              <!-- modal -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Products</h4>
                      </div>
                      <div class="modal-body">
                        <p>One fine body&hellip;</p>
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <h3 class="box-title">Input data Product</h3>
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <form role="form" action="{{route('storeproduct')}}" enctype="multipart/form-data" method="post" >
                            @csrf
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Stock</label>
                                <input name="stock" type="number" class="form-control" id="stock" placeholder="Enter stock">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select name="category" type="text" class="form-control" id="category" >
                                  <option>Choose categories</option>
                                  @foreach($categorys as $c)
                                  <option value="{{$c->id}}">{{$c->category}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input name="price" type="number" class="form-control" id="price" placeholder="Enter price">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input name="description" type="text" class="form-control" id="description" placeholder="Enter description">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputFile">Image input</label>
                                <input name="image" type="file" id="image">

                                <p class="help-block">Enter image correctly.</p>
                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit"  class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
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
                      <th>No.</th>
                      <th>Image</th>
                      <!-- <th>Code</th> -->
                      <th>Name</th>
                      <!-- <th>Varian</th> -->
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($products as $p)
                    <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>
<!--                                 <img src="{{$p->image}}"
                                 width="70px"
                                 height="70px"
                                 alt="Product Image"> -->
                                 {{$p->image}}
                               </td>
                               <td>{{$p->name}}</td>
                               <td>{{$p->stock}}</td>
                               <td>{{$p->category}}</td>
                               <td>{{$p->price}}</td>
                               <td>{{$p->description}}</td>
                               <td>
                                <a href="" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                              <th>Footer table</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>

                  @endsection