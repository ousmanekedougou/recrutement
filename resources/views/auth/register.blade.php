@extends('admin.layouts.app')

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                
        
        
        <!-- les inputs -->

             <!-- general form elements -->
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter un administrateur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('membre.store') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">

              <div class="col-lg-12">

                  <div class="row">
                    
                      <div class="col-lg-6 col-lg-offset-3">
                      <div class="form-group">
                        <label class="col-form-label text-md-right" for="name">Prenom & Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      
                    
                      
                      <div class="form-group">
                          <label class="col-form-label text-md-right" for="email">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>


                      <div class="form-group">
                          <label class="col-form-label text-md-right" for="phone">Telephone</label>
                          <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>



                      <div class="form-group">
                          <label class="col-form-label text-md-right" for="password">Mot de passe</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>


                      <div class="form-group">
                          <label class="col-form-label text-md-right" for="password_confirmation">Confirmer le mot de passe</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>


                        <div class="form-group">
                                <div class=" checkbox">
                                    <label class="col-form-label text-md-right"> <input type="checkbox" name="status" @if (old('status') == 1) 
                                    checked
                                    @endif 
                                    
                                    value="1" id=""><span class="text-bold">Status</span></label>
                                </div>
                        </div>

                      </div>

                  </div>
                  <div class=" form-group col-lg-6 col-lg-offset-3" >
                    <button type="submit" class="btn btn-primary">Enregistre</button>
                    <a  href="{{ route('home.index') }}" class="btn btn-warning">Retoure</a>
                  </div>

                </div>

              


            </form>
          </div>
          <!-- /.box -->


        <!-- fin des inputs -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection