@extends('admin.layouts.app')

@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
@endsection


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="{{ Storage::url($show_etudiant->image) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $show_etudiant->name }}</h3>

              <p class="text-muted text-center">Etudiant</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope-o"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_etudiant->email }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-phone"></i></b>  <a class="pull-center text-muted text-bold tex-italic">  {{ $show_etudiant->phone }}</a>
                </li>
                <li class="list-group-item">
                <b><i class="fa fa-mortar-board"></i></b>  <a class="pull-center text-muted text-bold tex-italic">{{ $show_etudiant->niveau }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="active"><a href="#activity" data-toggle="tab">Les documents et images poster </a></li> -->
              <!-- <li class="pull-right"><a href="#settings" data-toggle="tab">Modifier </a></li> -->
          
            </ul>

            

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                  <!-- .user-block -->
                  <div class="user-block">
                      <table class="table">
                        <tbody>
                         <tr>
                           <th>Date de naissance</th>
                          <th>Lieu de naissance</th>
                          <th>Commune</th>
                          <th>Etablissement</th>
                          <th>Fillieres</th>
                         </tr>
                         <tr>
                          <td>{{ $show_etudiant->naissance }}</td>
                          <td>{{ $show_etudiant->lieu }}</td>
                          <td>{{ $show_etudiant->commune->name }} ({{ $show_etudiant->commune->departement->name }}) </td>
                          <td>
                            @foreach($show_etudiant->etablissements as $etud_etab)
                              {{$etud_etab->name}},
                            @endforeach
                          </td>
                          <td>
                            @foreach($show_etudiant->faculties as $etud_fille)
                              {{$etud_fille->name}},
                            @endforeach
                          </td>
                         </tr>
                        </tbody>
                      </table>
                          <!-- /.box-body -->
                    <div class="box-footer">
                      <ul class="mailbox-attachments clearfix">

                        <li>
                            <a href="{{ Storage::url($show_etudiant->diplome) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Attestation ou diplome
                                  <!-- <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->bac}}" data-target="#modal-default-update-bac" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a> -->
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_etudiant->curiculum) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Curiculum Vitae
                                  <!-- <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->certificat}}" data-target="#modal-default-update-attestation" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a> -->
                                </span>
                          </div>
                        </li>

                        <li>
                            <a href="{{ Storage::url($show_etudiant->identite) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size text-bold">
                                  Photocopie CNI
                                  <!-- <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->photocopie}}" data-target="#modal-default-update-photocopie" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a> -->
                                </span>
                          </div>
                        </li>

                        <!-- <li>
                            <a href="{{Storage::url($show_etudiant->image)}}" class="mailbox-attachment-name">
                          <span class="mailbox-attachment-icon has-img"><img src="{{Storage::url($show_etudiant->image)}}" alt="Attachment"></span>
                          </a>
                          <div class="mailbox-attachment-info">
                                <span class="mailbox-attachment-size">
                                   Image  CNI
                                  <a data-toggle="modal" data-id="{{$show_etudiant->id}}" data-name="{{$show_etudiant->image}}" data-target="#modal-default-update-image" class="btn btn-default btn-xs pull-right btn-info"><i class="fa fa-edit"></i></a>
                                </span>
                          </div>
                        </li> -->

                      </ul>
                    </div>
                    <div class="box-footer">
                    <div class="pull-left">
                    <a style="margin-right:5px;" href="{{ route('home.index') }}" class="btn btn-warning btn-xs"><i class="fa fa-share"></i> Retoure</a>
                    
                    </div>
                    </div>
                  </div>
                  <!-- /.user-block -->

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->



              <!-- <div class="tab-pane" id="settings">
                <form class="form-horizontal" methode="post" action="{{ route('home.update',$show_etudiant->id) }}">
                  @csrf 
                  {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{ $show_etudiant->nom ?? old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="inputName" name="nom" placeholder="">
                      @error('nom')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prenom</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{$show_etudiant->prenom ?? old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror" id="inputName" name="prenom" placeholder="">
                      @error('prenom')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" value="{{$show_etudiant->email ?? old('email')}}" class="form-control @error('email') is-invalid @enderror" id="inputName" name="email" placeholder="">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="number" name="phone" value="{{ $show_etudiant->phone ?? old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="">
                      @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Commune</label>

                    <div class="col-sm-10">
                      <select name="commune"   value="{{  old('commune')}}" class="form-control @error('commune') is-invalid @enderror" id="">
                      
														<option value=""></option>
                        @error('commune')
                      <span class="invalid-feedback" role="alert">
                          <strong class="message_error">{{ $message }}</strong>
                      </span>
                      @enderror
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Modifier</button>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- /.tab-pane -->
            </div>

            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Debut du modal pour l'eddition de l'extrait -->
      
        <div class="modal fade" id="modal-default-update-bac">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Extrait </h4>
              </div>
              <form action="{{ route('home.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('bac')}}" class="form-control @error('bac') is-invalid @enderror" id="bac" name="bac" placeholder="">
                  @error('bac')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
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
<!-- Fin du modal de l'eddition de l'extrait -->


<!-- Debut du modal pour l'eddition de l'certificat -->

        <div class="modal fade" id="modal-default-update-attestation">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Attestation </h4>
              </div>
              <form action="{{ route('home.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('certificat')}}" class="form-control @error('certificat') is-invalid @enderror" id="certificat" name="certificat" placeholder="">
                  @error('certificat')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
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
<!-- Fin du modal de l'eddition de l'attestation -->


<!-- Debut du modal pour l'eddition de la photocopie -->

        <div class="modal fade" id="modal-default-update-photocopie">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Photocopie </h4>
              </div>
              <form action="{{ route('home.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('photocopie')}}" class="form-control @error('photocopie') is-invalid @enderror" id="photocopie" name="photocopie" placeholder="">
                  @error('photocopie')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
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
<!-- Fin du modal de l'eddition de la photocopie -->


<!-- Debut du modal pour l'eddition de l'image -->

        <div class="modal fade" id="modal-default-update-image">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editer Votre Image </h4>
              </div>
              <form action="{{ route('home.update',$show_etudiant->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p>
                <input type="file"  value="{{ old('image')}}" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="message_error">{{ $message }}</strong>
                    </span>
                  @enderror
                </p>
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
<!-- Fin du modal de l'eddition de l'image -->





@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->