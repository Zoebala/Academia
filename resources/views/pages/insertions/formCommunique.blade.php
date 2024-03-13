@extends('base')
@section("titre","Communiqué")
@section("titre_page","Communiqué | ".config('app.name'))
@section("sous_titre",config('app.name')."/Communiqué")

@section('content')
<section class="content" style="width:100%;">
    <div class="container-fluid carousel-content animate__animated animate__fadeInUp">
        <x-alertmessage />
        
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0" style="background:linear-gradient(rgb(12, 116, 161),white,rgb(12, 116, 161));">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Individuel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Collectif</a>
                </li>
               
              </ul>
            </div>
            <div class="card-body" style="background:linear-gradient(rgb(12, 116, 161),white,rgb(12, 116, 161));">
              <div class="tab-content" id="custom-tabs-four-tabContent" >
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <!-- form pour la section-->
                  <section class="content " style="background:linear-gradient(rgb(12, 116, 161),white,rgba(8, 8, 127, 0.776),rgb(12, 116, 161));">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-8" >
                            <!-- general form elements -->
                            <div class="card card-primary" style="background-color: rgba(165, 165, 231, 0.536);">
                              <div class="card-header" style="background-color:rgb(12, 116, 161);">
                                <h3 class="card-title"><i class="fa fa-bullhorn"></i> Communiqué à </h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("insertIndivMessage")}}" method="post">
                                @csrf
                                <div class="card-body" style="background-color: rgba(165, 165, 231, 0.536);">
                                    <div class="form-group">
                                        {{-- <label for="etudiant">Etudiant</label> --}}
                                        <input list="browsers" placeholder="recherche..." id="etudiant" name="telephone" class="form-control @error('telephone') is-invalid @enderror">
                                        <datalist id="browsers" id="exampleInputPassword1">
                                         @foreach ($Etudiants as $Etudiant)
                                             
                                         <option value="{{$Etudiant->teletudiant}}">{{$Etudiant->nom.' '.$Etudiant->prenom}}</option>
                                         @endforeach
                                        </datalist>
                                      </div>

                                      <div class="form-group col-md-12">
      
                                          <div class="py-1">
                                              <label for="contenu" class="font-italic">Saisir votre message</label><br>
                                              <textarea name="contenu" value="{{ old('contenu') }}" id="contenu" class="ckeditor form-control @error('contenu') is-invalid @enderror">
                  
                                              </textarea>
                                          </div>                     
                                          
                                      </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="text-center" style="background-color: rgba(165, 165, 231, 0.536);">
                                  <button type="submit" class="btn btn-outline-dark">Envoyé</button>
                                </div>
                              </form>
                              <div class="social-auth-links text-center" style="background-color: rgba(165, 165, 231, 0.536);"> 
                                <a href="{{url('')}}" class="btn btn-block text-light font-italic" style="background-color:rgb(12, 116, 161);">
                                    <i class="fas fa-file-alt me-2"></i> Liste des messages
                                </a>
                                
                            </div>
                           </div>
                            <!-- /.card -->
                          </div>
                          <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                  </section>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <!-- form pour le departement-->
                  <section class="content" style="background:linear-gradient(rgb(12, 116, 161),white,rgba(8, 8, 127, 0.776),rgb(12, 116, 161));">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary" style="background-color: rgba(165, 165, 231, 0.536);">
                              <div class="card-header" style="background-color:rgb(12, 116, 161);">
                                <h3 class="card-title"> <i class="fa fa-bullhorn"></i> Communiqué </h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("insertColMessage")}}" method="post" autocomplete="off">
                                @csrf
                                <div class="card-body" style="background-color: rgba(165, 165, 231, 0.536);">
                                  
                                  <div class="form-group">
                                    {{-- <label for="etudiant">Etudiant</label> --}}
                                    <select name="etudiants" id="" class="form-control">
                                        <option value="1">A tous les étudiants</option>
                                        <option value="2">Aux étudiants ayant obtenu au moins 60%</option>
                                        <option value="3">Aux étudiants ayant obtenu moins de 60%</option>
                                        
            
                                    </select>
                                    
                                   
                                  </div>
                                  <div class="form-group col-md-12">

                                    <div class="py-1">
                                        <label for="contenu" class="font-italic">Saisir votre message</label><br>
                                        <textarea name="contenu" value="{{ old('contenu') }}"  id="contenu" class="ckeditor form-control @error('contenu') is-invalid @enderror">
            
                                        </textarea>
                                    </div>                     
                                    
                                </div>
                                </div>
                                <!-- /.card-body -->                
                                <div class="text-center mb-1"  style="background-color: rgba(165, 165, 231, 0.536);">
                                  <button type="submit" class="btn btn-outline-dark">Envoyé</button>
                                </div>
                              </form>
                              <a href="{{url('')}}" class="btn btn-block text-light font-italic"  style="background-color:rgb(12, 116, 161);">
                                <i class="fas fa-file-alt me-2"></i> Liste des messages
                             </a>
                            </div>
                            <!-- /.card -->
                          </div>
                          <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                  </section>
                </div>
                
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      
      <!-- /.card -->
   
    <!-- /.container-fluid -->
  </section>
        
@endsection