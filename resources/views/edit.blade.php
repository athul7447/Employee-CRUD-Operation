@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Create Employee</h3>
         </div>
         <form role="form" action="/employees/update" enctype="multipart/form-data" method="post">
         	@csrf
            @foreach($data as $row)
            <div class="box-body">
               <div class="col-md-6">
               	<div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $row->name }}">
                     <input type="hidden" class="form-control" id="uid" name="uid" value="{{ $row->id }}">
                  </div>
                  	@error('name')
                        <span class="help-block" style="color: #ff0505;"><strong>Error! </strong>{{ $message }}</span>
					@enderror
                  <div class="form-group">
                     <label for="email">Email </label>
                     <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $row->email }}">
                  </div>
                  	@error('email')
                        <span class="help-block" style="color: #ff0505;"><strong>Error! </strong>{{ $message }}</span>
					@enderror
                  
                  <div class="form-group">
                     <label for="exampleInputFile">Photo</label>
                     <input type="file" id="photo" name="photo">
                     <input type="hidden" name="imgname" value="{{$row->photo}}">
                     @error('photo')
                        <span class="help-block" style="color: #ff0505;"><strong>Error! </strong>{{ $message }}</span>
					@enderror
                  </div>
                  <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
                  	<option value="">Select</option>
                  	@foreach($designation as $key)
                    <option value="{{ $key->designation }}" {{$row->designation == $key->designation  ? 'selected' : ''}}>{{ $key->designation}}</option>
                    @endforeach
                    
                  </select>
                  </div>
                  @error('designation')
                        <span class="help-block" style="color: #ff0505;"><strong>Error! </strong>{{ $message }}</span>
					@enderror
               </div>
               @endforeach
               		
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
      <!-- /.box -->
      <!-- /.box -->
   </div>
</div>
@endsection