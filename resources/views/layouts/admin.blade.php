<!doctype html>
<html lang="en">
  <head>
  	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('before-style')
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('./sidebar/css/style.css') }}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @stack('after-style')
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
					</button>
        		</div>
				<div class="p-4">
					<h1><a href="" class="logo">Admin</a></h1>
					<ul class="list-unstyled components mb-5">
						<li class="{{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
							<a href="{{ route('dashboard.admin') }}"><span class="fa fa-home mr-3"></span>Dashboard</a>
						</li>
						<li class="{{ request()->routeIs('question-admin.index') ? 'active' : '' }}">
							<a href="{{ route('question-admin.index') }}"><span class="fa fa-question-circle mr-3"></span>Question</a>
						</li>
						<li class="{{ request()->routeIs('result-admin.index') ? 'active' : '' }}">
							<a href="{{ route('result-admin.index') }}"><span class="fa fa-check-circle mr-3"></span>Hasil Tes</a>
						</li>
						<li class="{{ request()->routeIs('header-admin.index') ? 'active' : '' }}">
							<a href="{{ route('header-admin.index') }}"><span class="fa fa-header mr-3"></span>Header</a>
						</li>
						<li class="{{ request()->routeIs('about-admin.index') ? 'active' : '' }}">
							<a href="{{ route('about-admin.index') }}"><span class="fa fa-info-circle mr-3"></span>About</a>
						</li>
						<li class="{{ request()->routeIs('instruction-admin.index') ? 'active' : '' }}">
							<a href="{{ route('instruction-admin.index') }}"><span class="fa fa-list-ul mr-3"></span>Instruction</a>
						</li>
						<li class="{{ request()->routeIs('card-admin.index') ? 'active' : '' }}">
							<a href="{{ route('card-admin.index') }}"><span class="fa fa-credit-card mr-3"></span>Card</a>
						</li>
						<li class="{{ request()->routeIs('faq-admin.index') ? 'active' : '' }}">
							<a href="{{ route('faq-admin.index') }}"><span class="fa fa-question mr-3"></span>Faq</a>
						</li>
						<li class="{{ request()->routeIs('user-admin.index') ? 'active' : '' }}">
							<a href="{{ route('user-admin.index') }}"><span class="fa fa-users mr-3"></span>Manage User</a>
						</li>
					</ul>
					


					<div class="footer">
						<p>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://lokerapp.xenulis.my.id" target="_blank">bantudiri.com</a>
						</p>
					</div>

				</div>
    		</nav>

        	<!-- Page Content  -->
			@yield('content')
		</div>

	@stack('before-script')
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="{{ asset('./sidebar/js/popper.js') }}"></script>
    <script src="{{ asset('./sidebar/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./sidebar/js/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js') }}"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	@stack('after-script')
  </body>
</html>