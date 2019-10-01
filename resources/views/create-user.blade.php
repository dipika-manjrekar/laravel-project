@extends('layouts.app')
    <script src="{{asset('js/aes.js')}}"></script>
	<script src="{{asset('js/aes-json-format.js')}}"></script>
	
@section('content')

 <div class="content-header row breadcrumbbg ">
	<div class="content-header-left col-md-6 col-12">
		<h4 class="content-header-title">Create User</h4>
	</div>
	<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
		<div class="breadcrumb-wrapper col-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="">Home</a>
				</li>
				
				
			</ol>
		</div>
	</div>
</div>

<div class="content-body">
	<!-- Sales stats -->
	
	<div class="row">
		<div class="col-12">
			<div class="card sectionbordertop">
				<div class="card-content">
					
					
					<div class="card-body">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>
										{{ $error }}
									</li>
									@endforeach
								</ul>
							</div>
							<br />
							@endif
						<div class="row">
							<div class="col-md-12">
								
								<form class="form form-horizontal formmarginbottom" method="post" id="testform" action="{{url('store/contact')}}" enctype="multipart/form-data" autocomplete="off" data-validate="parsley">
									
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">First Name<span class="require_id"> *</span></label>
													<div class="col-md-9">
														<input type="textbox" id="firstname" class="form-control" name="firstname"  data-parsley-minlength="2" data-parsley-maxlength="50"  data-parsley-pattern="/^[A-Za-z0-9-,.:;&()=_@\/\?#+*$%&\'\`\s]*$/"   data-parsley-trigger="change focusout" data-parsley-required-message="Required" required="">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">Middle Name</label>
													<div class="col-md-9">
														<input type="textbox" id="middlename" class="form-control" name="middlename"   >
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
														data-parsley-minlength="2" data-parsley-maxlength="50"  data-parsley-trigger="change  focusout" data-parsley-required-message="Required" required="">
													</div>
												</div>
												
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput9">Email ID</label>
													<div class="col-md-9">
														<input type="textbox" id="email_id" class="form-control" autocomplete = "new-password" name="email_id"  data-parsley-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4}$)+$/"  data-parsley-trigger="change focusout"  >
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
														<input class="form-control" data-parsley-fileextension='jpeg,jpg,png,bmp'data-parsley-required-message="upload image in jpeg,jpg,png,bmp format" data-parsley-trigger="change " id="photo" name="photo"  type="file"/>
														<div id='demo' style="margin-left:27%; color:#D63301;"></div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="userinput1">Contact Number</label>
													<div class="col-md-9">
														<input type="textbox" id="contact_no" class="form-control" name="contact_no" 
														data-parsley-pattern="/^[0-9\+\-]+$/" data-parsley-minlength="10" data-parsley-maxlength="10"   data-parsley-trigger="change focusout" >
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
														data-parsley-pattern="/^[0-9\+\-]+$/" data-parsley-minlength="8" data-parsley-maxlength="8" data-parsley-trigger="change focusout">
													</div>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-md-3 label-control" for="projectinput7">Notes</label>
													<div class="col-md-9">
														<div class="col-md-9">
														<input type="textbox" id="notes" class="form-control" name="notes" 
														data-parsley-pattern="/^[A-Za-z0-9-,.:;&()=_@\/\?#+*$%&\'\`\s]*$/" >
													</div>
													</div>
												</div>
										</div>
										</div>
									</div>
									
									<div class="form-actions center buttonmargintop">
										<button type="button" class="btn-sm btn btn-info waves-effect waves-light newbtn hvr-glow box-shadow-3" onclick="location.href=''">
											<span class="btn-label"><img src="{{ asset('images/back.png') }}" style="height: 18px;"> </span> Back
										</button>
										<button type="submit"  class="btn-sm btn btn-info waves-effect waves-light newbtn hvr-glow box-shadow-3 " name="submit" id="submit"  ">
											<span class="btn-label"><img src="{{ asset('images/submit.png') }}" style="height: 18px;"> </span>Submit
										</button>
									</div>
									
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
		<div class="row" style="height: 200px;">
			<div class="col-md-12">
				
				
				
				</div>
			
			</div>
	
</div>
<script>
	var uploadFile = document.getElementById('photo');
	uploadFile.onchange = function() {
		//alert(this.files[0].size);
		if(document.getElementById("photo").value != "")
		{
			if(this.files[0].size < 2048)
			{
				
				document.getElementById("demo").innerHTML = "File size must be greater than 2KB!!!";
				
				$('#submit').attr('disabled', true);
				
			}
			else if(this.files[0].size >  512000)
			{
				//alert("aaaaaaa");
				document.getElementById("demo").innerHTML = "File size must be less than 500KB!!!"; 
				$('#submit').attr('disabled', true);
			}
			
			else if(this.files[0].size > 2048 && this.files[0].size < 512000)
			{
				document.getElementById("demo").innerHTML = "";
				$('#submit').attr('disabled', false);
			}
		}
		else{
			document.getElementById("demo").innerHTML = "";
			$('#submit').attr('disabled', false);
		}
		
	};
</script>
<script>
$(".require_id").css("color","red");
		$(function () {
  $('#testform').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
  })
  
});
</script>
@endsection
