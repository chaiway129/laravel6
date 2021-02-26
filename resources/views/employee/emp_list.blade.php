
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="message"></div>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Employee Name</th>
            <th>Employee Status</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($employee as $emp)
        <tr>
            <td class="index">{{ ++$i }}</td>
            <td>{{ $emp->emp_name }}</td>
            <td>{{ $emp->emp_status }}</td>
            <td>
               
                    <a class="btn btn-info" href="{{ route('employee.show',$emp->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('employee.edit',$emp->id) }}">Edit</a>
                    <input type="hidden" name="emp_id" class="emp_id" value="{{$emp->id}}">
                    <button type="button" class="btn btn-danger delete-btn delete_{{ $emp->id }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Confirm</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="empForm">
       <div class="modal-body">
                    @csrf
                    @method('DELETE')
        <p>Are you sure..?</p>
        <input type="hidden" name="id" id="emp_delete_id">
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" id="modal-btn-si">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no" data-dismiss="modal">No</button>
      </div>
     </form>
    </div>
  </div>
</div>

  
    {!! $employee->links() !!}
      
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function(){

      function setIndex(){
       $("td.index").each(function(index) {
           $(this).text(++index);
       });
      }

     $(".delete-btn").click(function()
     {
        var data = $(this).closest('tr').find("input[name='emp_id']").val();
        $("#mi-modal").modal('show');
        $('#emp_delete_id').val(data);       
    });

    setIndex();

    $('#empForm').on('submit',function(e){
      e.preventDefault();
         var id =$('#emp_delete_id').val();
      $.ajax({
          url: "employee/delete/"+id,
          type: "GET",
          success: function(data) {
            console.log(data);
            if(data.success){
                $("#mi-modal").modal('hide');
              //  alert('Record Deleted Successfully');
                $('.delete_'+id).closest( "tr" ).remove();
                setIndex();
                var msg = '<div class="alert alert-success">'+
                '<p>'+data.message+'</p>'+
                '</div>';
                $('.message').html(msg);
              }
          },
          error: function() {
           var str = 'Error occure while deleting record';
           var msg = '<div class="alert alert-danger">'+
            '<p>'+str+'</p>'+
            '</div>';
            $('.message').html(msg);
          },
        });
    });
  });
</script>
