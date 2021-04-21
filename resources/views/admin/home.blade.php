@extends('admin.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        La liste des etudiants
        <small>Appercue des informations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box-body">
        <div class="row text-center">
            <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Toute les fillieres</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @foreach(App\Models\User\Faculty::all() as $faculty)
                      <li><a href="{{ route('home.index', ['filliere'
												=> $faculty->slug]) }}">{{$faculty->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
        </div>
          <!-- debut de la table -->
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Num</th>
                  <th class="text-center">Image</th>
                  <th class="text-center">Prenom et nom</th>
                  <th class="text-center">email</th>
                   <th class="text-center">telephone</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($etudiants as $home)
                  <tr>
                  <td class="text-center">{{ $loop->index +1 }}</td>
                  <td class="text-center">  <img style="width:50px;height:50px;" class="img-circle img-responsive" src="{{ Storage::url($home->image) }}" ></td>
                  <td class="text-center">{{ $home->name }}</td>
                  <td class="text-center">{{ $home->email }}</td>
                  <td class="text-center">{{ $home->phone }}</td>
                  <td class="text-center"><a href="{{ route('home.show',$home->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
              
                    <form id="delete-form-{{$home->id}}" method="post" action="{{ route('home.destroy',$home->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a href="" onclick="
                    if(confirm('Etes Vous Sur De Supprimer Cette Categorie ?')){

                    event.preventDefault();document.getElementById('delete-form-{{$home->id}}').submit();

                    }else{

                      event.preventDefault();

                    }
                    
                    "><i class="glyphicon glyphicon-trash text-danger"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                 <thead>
                <tr>
                  <th class="text-center">Num</th>
                  <th class="text-center">image</th>
                    <th class="text-center">Prenom et nom</th>
                    <th class="text-center">email</th>
                   <th class="text-center">telephone</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
              </table>
              {{ $etudiants->links() }}
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection

@section('footersection')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection