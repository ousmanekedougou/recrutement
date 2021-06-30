<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>DG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{ asset('admin/dist/img/admin.png') }}" alt="" srcset=""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('admin/dist/img/default-50x50.gif')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::guard('web')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(Auth::user()->image == null)
                <img src="{{ asset('admin/dist/img/default-50x50.gif')}}" class="img-circle" alt="User Image">
              @else 
                <img src="{{ Storage::url(Auth::user()->image) }}" class="img-circle" alt="User Image">
              @endif
                <p>
                  {{ Auth::guard('web')->user()->name }} - admin
                  <small>Membre depuis {{ Auth::guard('web')->user()->created_at->toFormattedDateString() }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('membre.show',Auth::user()->id )}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a 
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                   class="btn btn-default btn-flat">Se Deconnecter</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>