@extends('layouts.app')

@section('content')
<style>
body {
    overflow: hidden;
}
</style>
<div class="content-header row breadcrumbbg ">
    <div class="content-header-left col-md-6 col-12">
        <h4 class="content-header-title">List</h4>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('administratorDashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">List</a>
                </li>

            </ol>
        </div>
    </div>
</div>
<div class="content-body">
<div data-backdrop="static" data-keyboard="false" class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content load_modal"></div>
		</div>
	</div>
    <!-- Sales stats -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">

                    <div class="card-header">
                        <h4 class="card-title blanktitle"></h4>

                        <div class="heading-elements">
                        <a id="activedirectory" href="{{url('create/contact')}}"
                                class="btn-sm btn btn-info waves-effect waves-light newbtn hvr-glow box-shadow-3 position">
                                <span class="btn-labelheader"><img class="btnimgheight"
                                        src="{{ asset('images/add.png') }}"> </span>Add</a>                                      
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Photo</th>
                                    <th>Middle Name</th>
                                    <th> Last Name</th>
                                    <th>Contact List</th>
                                    <th>Landline Number</th>
                                    <th>Email ID</th>
									<th>Number Of Views</th>
                                    <th>Notes</th>
									<th>Dates</th>
                                    <th class="btn_cen">Edit</th>
                                    <th class="btn_cen">Delete</th>
                                </tr>
                            </thead>
                            <thead>
                            @foreach($showrecord as $record)
                            <tr>
                            <td>{{$record->first_name}}</td>
                            <td><a href="{{ asset('uploads/'.$record->photo) }}" target = "_new">{{$record->photo}}</a>	 </td>
                            <td>{{$record->middle_name}}</td>
                            <td>{{$record->last_name}}</td>
							<td>{{$record->mobile_number}}</td>
							 <td>{{$record->landline_no}}</td>
                            <td>{{$record->email}}</td>
                            <td><center> <img class="imgresp" src="{{ asset('images/view.png') }}">{{$record->views}} </center></td>
                           
                            <td>{{$record->notes}}</td>
							<td>{{$record->date}}</td>
                            <td><input type="hidden" id="viewid"  value="{{$record->views}}"><button type="button" name="edit" id="bulk_delete" class="btn btn-link" ><img class="imgresp" src="{{ asset('images/edit.png') }}"onclick="edit({{$record->id}})"></button></td>

                            <td><button type="button" name="delete" id="bulk_delete" class="btn btn-link" ><img class="imgresp" src="{{ asset('images/delete.png') }}"onclick="deleteFunction({{$record->id}},event)"></button></td>
                            
                            </tr>
                            @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--script>
$(document).ready(function() {
    $('#table').DataTable();
  //var base_url = {!! json_encode(url('/')) !!};
// 	$(window).resize(function() {

// $('.dataTables_scrollBody').css('height', ($(window).height() - 239));
// });
// 	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
// 	    $('#table').DataTable({
// 	   processing: true,
// 	   serverSide: true,
// 	   searchable: true,
// 	   "sScrollY": ($(window).height() - 239),
// "bPaginate": true,
// "bJQueryUI": true,
// "lengthMenu": [50, 70, 90, 110],
// "pageLength": 50,

//  //ajax: '{{ url('activedirectorydata') }}',
 
//  	ajax: {
// 		url: base_url+'/userlistdata',
// 		type: 'POST',
// 		data: {_token: CSRF_TOKEN},
// 		},
// 	   columns: [
// 				{ data: 'first_name', name: 'first_name' },
// 				{ data: 'middle_name', name: 'middle_name' },
// 				{ data: 'last_name', name: 'last_name' },
// 				{ data: 'email', name: 'email' },
//                 { data: 'email', name: 'email' },
//                 { data: 'mobile_number', name: 'mobile_number' },
//                 { data: 'landline_no', name: 'landline_no' },
// 				{ data: 'edit', name: 'edit' },
// 				{ data: 'delete', name: 'delete' },
// 			 ]
// 	}); 
 });
 </script-->
 <script>
$(document).ready(function() {
    $('#table').DataTable();
 });
 </script> 
 <script>
 function edit(id) 
{
	//var number=document.getElementById("viewid");
	var number= document.getElementById('viewid').value;
	var number1 = parseInt(number)  + parseInt(1);
	document.getElementById("viewid").value = number1;
	
	 var viewid= document.getElementById('viewid').value;
	
	 
    var base_url = {!!json_encode(url('/')) !!};
		$.get(base_url + '/user/edit/' + id + '/' + viewid, function(data) {
			$('#myModal').modal();
			$('#myModal').on('shown.bs.modal', function() {
				$('#myModal .load_modal').html(data);
			});
			$('#myModal').on('hidden.bs.modal', function() {
				$('#myModal .modal-body').data('');
			});
		});

}


   
	

 </script>
<script>
function deleteFunction(id,event) 
{
  //  alert(id);
	event.preventDefault();
	var base_url = {!! json_encode(url('/')) !!};
	// prevent form submit

		swal({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
	if (willDelete) {
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
				url: base_url+'/user/delete',
                type: 'post',
                data: {
                id: id,
                _token: CSRF_TOKEN,
            },
				success:function(data)
				{
                    swal("Deleted!", "User has been deleted.", "success");
					window.location.reload()
				}			
			});
	
		
	} else {
		//swal("Your imaginary file is safe!");
	}
	});

}


</script>
@endsection