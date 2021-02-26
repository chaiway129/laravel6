@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('employee.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Name:</strong>
                    <input type="text" name="emp_name" value="{{ $employee->emp_name }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                              <strong>Employee Status:</strong>
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="emp_status" id="flexRadioDefault1" value="active" <?php if($employee->emp_status=='active'){ echo 'checked'; }else{ echo '';} ?>>
  <label class="form-check-label" for="flexRadioDefault1">
    Active
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="emp_status" id="flexRadioDefault2" value="inactive" <?php  if($employee->emp_status=='inactive'){ echo 'checked'; }else{ echo '';} ?>>
  <label class="form-check-label" for="flexRadioDefault2">
    Inactive
  </label>
</div>
    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
               <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
@endsection