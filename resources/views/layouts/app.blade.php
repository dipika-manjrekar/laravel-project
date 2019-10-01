<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading">

<head>
    @include('includes.head')
</head>

<body class="vertical-layout vertical-menu 2-columns menu-collapsed fixed-navbar" data-open="click"
    data-menu="vertical-menu">

    <header>
        @include('includes.header')
    </header>
	@include('sweet::alert')
    <div id="app">
        <div id="sidebar">
            
              @include('includes.admin_sidebar')
          
        </div>
        <div class="app-content content">
            <div class="content-wrapper">
              <main>
                    @yield('content')
                </main>
            </div>
        </div>
     

        <footer>
            @include('includes.footer')
        </footer>
    </div>
</body>

</html>