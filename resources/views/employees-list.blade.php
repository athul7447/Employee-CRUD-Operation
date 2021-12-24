@extends('layouts.admin')

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Designation</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1;?>
                @foreach($data as $row)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->name }}
                    </td>
                    <td>{{ $row->email }}</td>
                    <td> <img height="150px" width="130px" src="{{ asset('uploads/' . $row->photo) }}"></td>
                    <td>{{ $row->designation }}</td>
                    <td><a href="employees/edit/{{$row->id}}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>&nbsp;<a href="delete/{{ $row->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a></td>
                  </tr>
                  <?php $i++;?>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Sl No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Designation</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $( "#employeestree" ).addClass( "active" );
    $( "#employees_list" ).addClass( "active" );
    });
  
</script>
      @endsection
