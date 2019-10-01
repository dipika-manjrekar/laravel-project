<div class="modal-header">
    <h4 class="modal-title">Edit Location</h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-12">

<form class="form form-horizontal" method="post"  id="editForm">
<input name="_method" type="hidden" value="PATCH">
<input name="viewid" type="hidden" value="{{$viewid}}">
<input type="hidden" value="{{csrf_token()}}" name="_token" />
<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">First Name<span class="require_id"> *</span></label>
													<div class="col-md-9">
														<input type="textbox" id="firstname" value="{{$user->first_name}}" class="form-control" name="firstname"  data-parsley-minlength="2" data-parsley-maxlength="50"  data-parsley-pattern="/^[A-Za-z0-9-,.:;&()=_@\/\?#+*$%&\'\`\s]*$/"   data-parsley-trigger="change focusout" data-parsley-required-message="Required" required="">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">Middle Name</label>
													<div class="col-md-9">
														<input type="textbox" id="middlename" class="form-control" name="middlename"  value="{{$user->middle_name}}"  >
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput5">Last Name<span class="require_id"> *</span></label>
													<div class="col-md-9">
														<input type="textbox" id="lastname" class="form-control"  name="lastname" data-parsley-pattern="/^[A-Za-z0-9-,.:;&()=_@\/\?#+*$%&\'\`\s]*$/"  
														data-parsley-minlength="2" data-parsley-maxlength="50" value="{{$user->last_name}}" data-parsley-trigger="change  focusout" data-parsley-required-message="Required" required="">
													</div>
												</div>
												
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput9">Email ID</label>
													<div class="col-md-9">
														<input type="textbox" id="email_id" class="form-control" autocomplete = "new-password" name="email_id"    value="{{$user->email}}" data-parsley-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4}$)+$/"  data-parsley-trigger="change focusout"  >
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput9">Photo</label>
													<div class="col-md-9">
													<input  type="hidden" name="photo" value="{{$user->photo}}">
														<input class="form-control " id="photo" name="photo" value="{{$user->photo}}" type="file"/>
														<a href="{{ asset('uploads/'.$user->photo) }}" target = "_new">{{$user->photo}}</a>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">Contact Number</label>
													<div class="col-md-9">
														<input type="textbox" id="contact_no" class="form-control" name="contact_no" 
														data-parsley-pattern="/^[0-9\+\-]+$/" value="{{$user->mobile_number}}" data-parsley-minlength="10" data-parsley-maxlength="10"   data-parsley-trigger="change focusout" >
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">Landline Number</label>
													<div class="col-md-9">
														<input type="textbox" id="landlineno" class="form-control" name="landlineno" 
														data-parsley-pattern="/^[0-9\+\-]+$/" value="{{$user->landline_no}}" data-parsley-minlength="8" data-parsley-maxlength="8" data-parsley-trigger="change focusout">
													</div>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput7">Notes</label>
													<div class="col-md-9">
														<div class="col-md-9">
														<input type="textbox" id="notes" class="form-control" name="notes" 
														value="{{$user->notes}}" data-parsley-pattern="/^[A-Za-z0-9-,.:;&()=_@\/\?#+*$%&\'\`\s]*$/" >
													</div>
													</div>
												</div>
										</div>
										</div>
									</div>
									
</form>
</div>
</div>
</div>
<div class="modal-footer">

<button type="button" class="btn-sm btn btn-info waves-effect waves-light newbtn hvr-glow box-shadow-3" name="submit" id="edit">
<span class="btn-label"><img src="{{ asset('images/submit.png') }}" style="height: 18px;"> </span>Submit
</button><button type="button" class="btn-sm btn btn-info waves-effect waves-light newbtn hvr-glow box-shadow-3" data-dismiss="modal"><img src="{{ asset('images/submit.png') }}" style="height: 18px;"> </span>Cancel</button>
</div>


<script type="text/javascript">
$("#edit").click(function(){
	$('.loading').show();
	var registerForm = $("#editForm");
	var formData = registerForm.serialize();
	id = '{!! $id !!}';
	$.ajax({
	url:'/user/update'+id,
	type:'POST',
	data:formData,
	success:function(data) {
		  $('#myModal').modal('hide');
		 swal("User has been Updated.", "success");
		window.location.reload() 
	},
	});
});
</script>







