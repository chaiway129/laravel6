@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> View Employee</h2>
            </div>
            
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Name:</strong>
                {{ $employee->emp_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Status:</strong>
                {{ $employee->emp_status }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              
               <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
    </div>
@endsection