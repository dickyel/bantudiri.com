<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @stack('before-styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  @stack('after-styles')

</head>
<body>
  
  <section class="h-100 w-100 section-navbar">
    
    <div class="header container-xxl mx-auto p-0 position-relative" data-aos="fade-up">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="#">
          <img style="margin-right: 0.75rem"
            src="assets/logo.svg" alt="" />
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
          aria-labelledby="targetModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content bg-modal border-0">
              <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                <a class="modal-title" id="targetModalLabel">
                  <img style="margin-top: 0.5rem"
                    src="assets/logo.svg"
                    alt="" />
                </a>
                <button type="button" class="close btn-close text-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                
                  <li class="nav-item position-relative">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                  </li>
                  <li class="nav-item position-relative">
                    <a class="nav-link {{ request()->routeIs('test-user') ? 'active' : '' }}" href="{{ route('test-user') }}">Tes Prokrastinasi</a>
                  </li>
                  <li class="nav-item position-relative">
                    <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">Faq</a>
                  </li>
                  <li class="nav-item position-relative">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a>
                  </li>
                 
                </ul>
              </div>
              <div class="modal-footer border-0" style="padding: 2rem; padding-top: 0.75rem">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-default btn-no-fill">Sign In</a>
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role == 'user')
                         
                              @if(Auth::user()->answers->count() > 1)
                              <li></li>
                              @else
                              <li><a class="dropdown-item" href="{{ route('test-user.before') }}">Test</a></li>
                              @endif
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endguest
              </div>
            </div>
          </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
          
            <li class="nav-item position-relative">
              <a class="nav-link active main" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item position-relative">
              <a class="nav-link" href="{{ route('test-user') }}">Test Prokrastinasi</a>
            </li>

            <li class="nav-item position-relative">
              <a class="nav-link" href="{{ route('faq') }}">Faq</a>
            </li>
            <li class="nav-item position-relative">
              <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
            </li>
          
          </ul>
          @guest
              <a href="{{ route('login') }}" class="btn btn-default btn-no-fill">Sign In</a>
          @else
              <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if(Auth::user()->role == 'admin')
                          <li><a class="dropdown-item" href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                      @elseif(Auth::user()->role == 'user')
                        @if(Auth::user()->answers->count() > 1)
                        <li></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('test-user.before') }}">Test</a></li>
                        @endif
                   
                      @endif
                      <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </ul>
              </div>
          @endguest

        
        </div>
      </nav>
  

      <div>
        @yield('header')
        
      </div>
    </div>
  </section>

  @yield('content')

  <section class="h-100 w-100 bg-white" data-aos="fade-up" data-aos-duration="1500"> 

		<div class="footer container-xxl mx-auto position-relative">
			<div class="list-footer">
				<div class="row gap-md-0">
					<div class="col-lg-5 col-md-6">
						<div class="">
							<div class="list-space">
								<img src="assets/logo-3.svg"
									alt="" />
                  <p>Bantudiri.com adalah platform berbasis website untuk membantu kamu yang ingin mengembangkan diri dan membangun kesejahteraan pribadi.</p> 
                  
                  <a href="#" style="width: 40px;"></a><i class="fab fa-facebook"></i></a>
                  <a href="#" style="width: 40px;"></a><i class="fab fa-instagram"></i></a>
                  <a href="#" style="width: 40px;"></a><i class="fab fa-tiktok"></i></a>
                  <a href="https://wa.me/6285163679522" target="_blank" style="width: 40px;"></a><i class="fab fa-whatsapp"></i></a>
               
							</div>
				
						</div>
					</div>
					<div class="col-lg-4 col-md-6 ">
						<h2 class="footer-text-title ">Menu</h2>
						<nav class="list-unstyled">
							<li class="list-space">
								<a href="{{ route('home') }}" class="list-menu">Beranda</a>
							</li>
							
							<li class="list-space">
								<a href="{{ route('test-user') }}" class="list-menu">Tes Prokrastinasi</a>
							</li>
							<li class="list-space">
								<a href="{{ route('faq') }}" class="list-menu">Faq</a>
							</li>
							<li class="list-space">
								<a href="{{ route('contact') }}" class="list-menu">Contact us</a>
							</li>
						</nav>
					</div>
					<div class="col-lg-3 col-md-6 ">
						<h2 class="footer-text-title">Alamat</h2>
						<nav class="list-unstyled">
							<li class="list-space">
                <a href="" target="_blank" class="list-menu">bantudiri@gmail.com</a>
				
							</li>
							<li class="list-space">
                Jl. Tamansari No.KM 2,5, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46196
							</li>
						
						</nav>
					</div>
					
				</div>
			</div>

		</div>
	</section> 

  @stack('before-script')
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  @stack('after-script')
</body>
</html