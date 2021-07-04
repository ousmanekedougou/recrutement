  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        @if(Auth::user()->image == null)
          <img src="{{ asset('admin/dist/img/default-50x50.gif')}}" class="img-circle" alt="User Image">
        @else 
          <img src="{{ Storage::url(Auth::user()->image) }}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('web')->user()->name}}</p>
          @if(Auth::user()->isAdmin == 1)
          <a href="#"><i class="fa fa-circle text-success"></i> Admistrateur</a>
          @else 
          <a href="#"><i class="fa fa-circle text-success"></i> Utilisateur</a>
          @endif
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      

        <li class="header">PARAMETRES</li>
        <li><a href="{{ route('filliere.index') }}"><i class="fa fa-file-text"></i> <span>Filliers</span></a></li>
        <li><a href="{{ route('etablissement.index') }}"><i class="fa fa-university"></i> <span>Etablissement</span></a></li>
        <li><a href="{{ route('home.index') }}"><i class="fa fa-graduation-cap"></i> <span>Etudiants</span></a></li>
        @if(Auth::user()->isAdmin == 1)
        <li><a href="{{ route('membre.index') }}"><i class="fa fa-user"></i> <span>Membres</span></a></li>
        @endif
        





      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

