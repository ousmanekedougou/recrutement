@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection


@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="box-header with-border">
          <h3 class="box-title">Administrateur</h3>
          @if(Auth::user()->isAdmin == 1)
            <a class="col-lg-offset-5 btn btn-success pull-right" href="{{ route('register') }}">Ajouter Un Admin</a>
          @endif
        </div>
        <div class="box-body">
            <!-- debut de la table -->
          <div class="">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped .table-responsive">
                <thead>
                <tr class="bg-primary">
                  <th>S.No</th>
                  <th>Prenom & Nom</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Actif</th>
                  <th>Status</th>
                  @if(Auth::user()->isAdmin == 1)
                  <th>Options</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                  @foreach($admins as $admin)
                  <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{ $admin->name }}</td>
                  <td>{{ $admin->email }}</td>
                  <td>{{ $admin->phone }}</td>
                  
                  <td>{{ $admin->status? 'Active' : 'Desactive' }}</td>
                  <td>{{ $admin->isAdmin? 'Admin' : 'User' }}</td>
                    @if(Auth::user()->isAdmin == 1)
                      <td class="text-center">
                        <a href="{{ route('membre.edit',$admin->id) }}" class="mr-4"><i class="glyphicon glyphicon-edit"></i></a>
            
                      
                        <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('membre.destroy',$admin->id) }}" style="display:none">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        </form>
                        <a href=""  data-toggle="modal" data-target="#modal-default-delete-{{$admin->id}}" class="ml-4" ><i class="glyphicon glyphicon-trash text-danger"></i></a>
                        <div class="modal fade" id="modal-default-delete-{{$admin->id}}">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Suppression d'etudiant</h4>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Etes vous sure de voloire supprimer cet etudiant
                                </p>
                              <form action="{{ route('membre.destroy',$admin->id) }}" method="post" style="display:none;">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                              </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr class="bg-primary">
                  <th>S.No</th>
                   <th>Prenom & Nom</th>
                  <th>email</th>
                  <th>phone</th>
                   <th>Actif</th>
                  <th>Status</th>
                  @if(Auth::user()->isAdmin == 1)
                  <th>Options</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footersection')
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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