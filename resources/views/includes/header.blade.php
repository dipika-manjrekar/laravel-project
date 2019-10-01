<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-blue">
	<div class="navbar-wrapper">
		<div class="navbar-header"
		style="background-color: #ffffff; border-bottom:2px solid #002a46; border-top:2px solid #002a46;">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item mobile-menu d-md-none mr-auto">
					<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ti-view-list"></i></a>
				</li>
				<li class="nav-item">
						<a class="navbar-brand" href="#"><img class="brand-logo" alt=""
						> <h3 class="brand-text"><img class="" alt="" 
						style="max-width: 82%; height: 31px;"></h3> </a>
				</li>
				<li class="nav-item d-md-none">
					<a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
					class="fa fa-ellipsis-v"></i></a>
				</li>
			</ul>
		</div>
		<div class="navbar-container content">
			<div class="collapse navbar-collapse" id="navbar-mobile">
				<ul class="nav navbar-nav mr-auto float-left">
					<li class="nav-item d-none d-md-block">
						<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
						class="ti-view-list"></i></a>
					</li>
					@if(session('role_id')==1)
					
					@endif
				</ul>
				<ul class="nav navbar-nav float-right">
					
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="dropdown dropdown-user nav-item">
						<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span
							class="avatar avatar-online"><img class="round user-name" width="60" height="60"
							avatar="{{ session('username') }}"></span></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"> {{ session('username') }}</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
								
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
					</li>
				</ul>
				
			</div>
			
		</div>
	</div>
</nav>