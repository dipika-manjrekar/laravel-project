

 @extends('layouts.app')
@section('content')
<script language="JavaScript" type="text/javascript">
			history.pushState(null, null, $(location).attr('href'));
				window.addEventListener('popstate', function () {
					history.pushState(null, null, $(location).attr('href'));
				});
		</script>
	<div class="content-header row breadcrumbbg ">
              <div class="content-header-left col-md-6 col-12">
                <h4 class="content-header-title">Dashboard</h4>
              </div>
              <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('administratorDashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Page Headers</a>
                    </li>
                    <li class="breadcrumb-item active">Breadcrumbs basic
                    </li>
                  </ol>
                </div>
              </div>
     </div>
<div class="content-body">
					<!-- Sales stats -->
					
			
					
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-content">

<div class="card-header">
<h4 class="card-title"></h4>
								
<div class="heading-elements">

</div>
</div>
<div class="card-body">
<h1>Dashboard</h1>
<br/>
<br/>
<br/>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection










