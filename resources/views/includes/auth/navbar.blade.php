<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <i class="fa fa-user" aria-hidden="true"></i>
          <span class=" ml-3 text text-bold text-capitalize" >{{ auth()->user()->name  }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header text text-bold text-dark ">{{ "Ksh" . number_format(auth()->user()->wallet->amount,2,".",",")  }} </span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.show',auth()->user()->email) }}" class="dropdown-item">
            <i class="fa fa-user-md" aria-hidden="true"></i> My Profile
            <span class="float-right text-muted text-sm">{{ auth()->user()->role }}</span>
          </a>
          <div class="dropdown-divider"></div>

          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn bg-gradient-danger btn-block ">Logout</button>
            </form>



          {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> --}}
          {{-- <div class="dropdown-divider"></div> --}}
          {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>

  </nav>

