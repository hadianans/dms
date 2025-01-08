<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Logo -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png') }}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.dataTables.min.css" />
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')

    <title>@yield('title')</title>
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="{{ asset('img/bg.jpeg') }}" alt="Image" class="img-fluid">
          <h3 class="name">Hafsocks</h3>
          <span class="country">Bandung, Indonesia</span>
        </div>

        <div class="counter d-flex justify-content-center">
          <!-- <div class="row justify-content-center"> -->
            <div class="col">
              <strong class="number">142</strong>
              <span class="number-label">Customer</span>
            </div>
            <div class="col">
              <strong class="number">12</strong>
              <span class="number-label">Sock</span>
            </div>
            <div class="col">
              <strong class="number">19</strong>
              <span class="number-label">Color</span>
            </div>
          <!-- </div> -->
        </div>
        
        <div class="nav-menu">
          <ul class="menu">
            <li class="Dashboard"><a href="/"><span class="icon-pie-chart mr-3"></span>Dashboard</a></li>

            <li class="Order"><a href="/order"><span class="icon-work mr-3"></span>Order</a></li>
            <li class="Production"><a href="/production"><span class="icon-gears mr-3"></span>Production</a></li>
            <li class="Finishing"><a href="/finishing"><span class="icon-pie-chart mr-3"></span>Finishing</a></li>

            <li class="Data">
              <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-database mr-3"></span>Data
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li class="Customer"><a href="/customer">Customer</a></li>
                    <li class="Sock"><a href="/sock">Sock</a></li>
                    <li class="Color"><a href="/color">Color</a></li>
                    <li class="Color"><a href="/employe">Employe</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="Yarn"><a href="/yarn"><span class="icon-cubes mr-3"></span>Yarn</a></li>

            <li><a href="/logout"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
        </div>
      </div>
      
    </aside>

    @include('sweetalert::alert')

    <main>
      <div class="site-section">
        <div class="container">
          <!-- <h1>Hello World!</h1> -->
          @yield('content')
        </div>
      </div>  
    </main>

    {{-- form delete hidden --}}
    <form action="" method="POST" id="form-delete">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
  
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')

  </body>
</html>