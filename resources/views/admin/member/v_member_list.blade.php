@extends('admin.v_template_admin')

@section('contentadmin')
<div class="content container-fluid">
<div class="box">
            <div class="box-header">
            <h3 class="box-title">Data Member</h3>
            <a class="btn btn-default" style=""href="{{url('')}}">Tambah++</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>Trident</td>
                <td>Internet
                    Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
                </tr>
                <tr>
                <td>Trident</td>
                <td>Internet
                    Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
                </tr>
                <tr>
                <td>Trident</td>
                <td>Internet
                    Explorer 5.5
                </td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
</div>
</div>

@endsection