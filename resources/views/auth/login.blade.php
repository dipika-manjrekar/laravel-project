<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Project</title>
    <link rel="shortcut icon" href="{{ asset('images/nseicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-ext.css">
    <link rel="stylesheet" type="text/css" href="css/components.css">
    <!--font-->
  
   
    <script src="{{asset('js/aes.js')}}"></script>
    <script src="{{asset('js/base64.js')}}"></script>
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
	<script src="{{asset('js/aes-json-format.js')}}"></script>
	<script src="{{asset('js/Encryption.js')}}"></script>
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        if (top !== self) {
            top.location.href = self.location.href;
            //document.location.href=top.location.href;
            //setTimeout(arguments.callee, 0);
        }
			history.pushState(null, null, $(location).attr('href'));
				window.addEventListener('popstate', function () {
					history.pushState(null, null, $(location).attr('href'));
				});
    });
    history.pushState(null, null, $(location).attr('href'));
    window.addEventListener('popstate', function() {
        history.pushState(null, null, $(location).attr('href'));
    });
    </script>
    @if(session('role_id')==1)
    <script>
    window.location.href = '{{ route("administratorDashboard") }}';
    </script>
    @elseif(session('role_id')==2)
    <script>
    window.location.href = '{{ route("BEDashboard") }}';
    </script>
	
    @elseif(session('role_id')==4)
    <script>
    window.location.href = '{{ route("userdashboard") }}';
    </script>
    @endif
</head>

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
    data-open="click" data-menu="vertical-menu" data-col="1-column">
    	<script>
			function encryptpass(){			
	
			document.getElementById("email").value = document.getElementById("usernameforshow").value;
			document.getElementById("usernameforshow").value = "";
			document.getElementById("password").value = document.getElementById("passwordforshow").value;
			document.getElementById("passwordforshow").value = "";
			
			var name = '{{ config('app.app_key') }}';
			var pass = document.getElementById('password').value;

			var encryptedstr1 = CryptoJS.AES.encrypt(JSON.stringify(pass), name, {format: CryptoJSAesJson}).toString();
			
			document.getElementById('password').value = encryptedstr1;
			}
		</script>
    <div style="background-color: rgba(0, 0, 0, 0.3);">
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-md-5 col-10 box-shadow-2 p-0">
                                <div class="border-grey border-lighten-3  m-0"
                                    style="background-color: rgba(255, 255, 255, 0.5); ">
                                    <div class="card-header border-0"
                                        style="background-color: rgba(255, 255, 255, 0.7); padding: 0.9rem 0.5rem;">
                                        <div class="card-title ">

                                            <div class="row">
                                               <div class="col-md-6" style="border-right:1px solid #a2a3a4;">
													<b> Enter Username And Password </b>
												</div>

                                                <div class="col-md-6">
                                                   
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-content">

                                        <!-- <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 "><span>Account Details</span></p> -->
                                        <br>
                                        <div class="card-body">

                                        <fieldset class="form-group position-relative has-icon-left" style="margin-bottom: 15px;">
                                                <input id="usernameforshow" autocomplete="off" style="padding: 0.8rem 2.5rem; background-color: rgba(255, 255, 255, 0.5);" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  required autofocus>
                                                <div class="form-control-position"><img src="images/user.png" style="margin-top: 8px; height: 28px;"></div>
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left" style="margin-top: 28px;">
                                                <input id="passwordforshow" autocomplete="new-password" style="padding: 0.8rem 2.5rem; background-color: rgba(255, 255, 255, 0.5);" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                                <div class="form-control-position"><img src="images/key.png" style="margin-top: 8px; height: 24px;"></div>
                                        </fieldset>												
                                                
                                            <form method="POST" action="{{ route('login') }}" autocomplete="off">
												  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input id="email" autocomplete="off" type="hidden"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        name="email" value="{{ old('email') }}" required autofocus>
                                                    {{-- @if ($errors->has('email'))
													<span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong> </span>
                                                    @endif --}}
                                                </fieldset>

                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input id="password" autocomplete="new-password" type="hidden"
                                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        name="password" required>
                                                </fieldset>
                                                <br>
                                                <div class="row">

                                                    <div class="col-md-12">

                                                        @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                        <div class="alert alert-danger mb-2" role="alert"
                                                            style="margin-top: 10px; color:red; border: 1px solid #eb5362;">
                                                            <strong> {{ $error }}</strong>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <button id="loginsubmit" type="submit"
                                                            class="btn btn-info btn-block" onclick="encryptpass();">
                                                            <i class="ft-unlock"></i> Login
                                                        </button>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
            <footer class="footer fixed-bottom footer-dark navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block" >Created by - <span style="color: #f1b519;"> Dipika Manjrekar.</span></span></p>
    </footer>
    
</body>

</html>
<script>
$(".require_id").css("color","red");

</script>