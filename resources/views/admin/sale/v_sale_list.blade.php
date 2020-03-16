        @extends('admin.v_template_admin')

        @section('contentadmin')
        <div class="content container-fluid">
        <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Data Sales</h3>
                    <a class="btn btn-default" style="" href="{{route('forminsertproduct')}}">Tambah++</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Product</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>Trident</td>
                        <td>Trident</td>
                        <td>Trident</td>
                        <td style="text-align: center;">
                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                        <th style="text-align: center;">Footer table</th>
                        <th style="text-align: center;">Footer table</th>
                        <th style="text-align: center;">Footer table</th>
                        <th style="text-align: center;">Footer table</th>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
        </div>
        </div>

        @endsection