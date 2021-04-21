@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="">
        <div class="">
          <h3 class="box-title">Fillieres</h3>
          <a  data-toggle="modal" data-id="#filliere" data-name="filliere" data-target="#modal-filliere-add" class="col-lg-offset-5 btn btn-success" href="">Ajouter Une fillieres</a>
         
        </div>
        <div class="box-body">
                    <!-- debut de la table -->
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Num</th>
                  <th class="text-center">fillieres</th>
                  <th class="text-center">slug</th>
                   <th class="text-center">status</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($fillieres as $filliere)
                  <tr>
                  <td class="text-center">{{ $loop->index +1 }}</td>
                  <td class="text-center">{{ $filliere->name }}</td>
                  <td class="text-center">{{ $filliere->slug }}</td>
                  <td class="text-center">
                    @if($filliere->status == 1)
                    <span class="btn btn-primary btn-xs">Publique</span>
                    @elseif($filliere->status == 2)
                     <span class="btn btn-warning btn-xs">Privee</span>
                    @endif
                  </td>
                  <td class="text-center"><a data-toggle="modal" data-id="{{$filliere->id}}" data-name="{{$filliere->name}}" data-target="#modal-default-update-filliere-{{ $filliere->id }}"><i class="glyphicon glyphicon-edit"></i></a>
              
                    <form id="delete-form-{{$filliere->id}}" method="post" action="{{ route('filliere.destroy',$filliere->id) }}" style="display:none">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                  <a href="" onclick="
                    if(confirm('Etes Vous Sur De Supprimer Cette Categorie ?')){

                    event.preventDefault();document.getElementById('delete-form-{{$filliere->id}}').submit();

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
                  <th class="text-center">fillieres</th>
                  <th class="text-center">slug</th>
                  <th class="text-center">status</th>
                  <th class="text-center">Options</th>
                </tr>
                </thead>
              </table>
              {{ $fillieres->links() }}
            </div>
            <!-- /.box-body -->
          </div>
            <!-- fin de la table -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

      <!-- LA PARTIE DES MODAL -->

      <!-- Debut du modal des ajouts -->
        <!-- Modal Departement -->
        <div class="modal fade" id="modal-filliere-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter une categorie</h4>
              </div>
              <form action="{{ route('filliere.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <p>
                <label for="filliere">Nom de la filliere</label>
                <input type="text"  value="{{ old('name')  }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="slug">Slug de la filliere</label>
                <input type="text"  value="{{ old('slug')  }}" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="">
                  @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
                <div class="form-group">
                  <div class=" radio">
                    <label class="col-form-label text-md-right"> <input type="radio" name="status" 
                    
                    value="1" id="status"><span class="text-bold">Publique</span></label>

                    <label class="col-form-label text-md-right"> <input style="margin-left:10px;" type="radio" name="status" 
                    
                    
                    value="2" id="status" ><span class="text-bold" style="margin-left:30px;">Privee</span></label>
                  </div>
                  <p>
                    @error('status')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                    @enderror
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistre</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- Fin du modal Departement -->
      <!-- Fin du modal des ajouts -->

    <!-- Debut du modal des edition  -->

    <!-- Fin du modal des edtions -->
      @foreach($fillieres as $modal_filliere)
        <div class="modal fade" id="modal-default-update-filliere-{{ $modal_filliere->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre filliere</h4>
              </div>
              <form action="{{ route('filliere.update',$modal_filliere->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
              <p>
                <label for="name">Nom de la fillieres</label>
                <input type="text"  value="{{ $modal_filliere->name ?? old('name')  }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                <p>
                <label for="slug">Slug de la fillieres</label>
                <input type="text"  value="{{ $modal_filliere->slug ?? old('slug')  }}" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="">
                  @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>

                    <div class="form-group">
                      <div class=" radio">
                        <label class="col-form-label text-md-right"> <input type="radio" name="status" 

                        @if($modal_filliere->status == 1)
                          checked
                        @endif
                        
                       value="1" id="status"><span class="text-bold">Publique</span></label>

                        <label class="col-form-label text-md-right"> <input style="margin-left:10px;" type="radio" name="status" 
                        
                          @if($modal_filliere->status == 2)
                            checked
                          @endif

                        value="2" id="status" ><span class="text-bold" style="margin-left:30px;">Privee</span></label>
                      </div>
                      <p>
                        @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong class="message_error">{{ $message }}</strong>
                          </span>
                        @enderror
                      </p>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
      <!-- FIN DE LA PARTIE DES MODAL -->

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