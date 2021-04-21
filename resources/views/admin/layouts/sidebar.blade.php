  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/default-50x50.gif')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('web')->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      

        <li class="header">LABELS</li>
        <li><a href="{{ route('filliere.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Filliers</span></a></li>
        <li><a href="{{ route('etablissement.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Etablissement</span></a></li>
        <li><a href="{{ route('home.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Etudiants</span></a></li>
        <li><a href="{{ route('membre.index') }}"><i class="fa fa-circle-o"></i> <span>Membres</span></a></li>
        





      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

