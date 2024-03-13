@extends('base')
@section("titre","Documents")
@section("titre_page","Upload Document | ".config('app.name'))
@section("sous_titre",config('app.name')."/Document")

@section('content')
    
       
       <section class="content" style="width:100%;">
        <div class="container-fluid">
            <x-alertmessage />
            <div class="card">
              @if (Auth::user())
                @if (Auth::user()->Admin==0)
                  <div class="card-header row bg-primary">
                          <div class="col-lg-6 col-md-6">
                            <h4 class="font-italic"> <i class="fas fa-folder"></i> Votre dossier @if(session('Etudiant')){{session('Etudiant')}}@endif </h4>
                          </div>
                            
                          <div class="col-lg-6 col-md-6 text-lg-right text-secondadry">
                            {{-- <span class="font-weight-bold font-italic">Etape 3/4</span> --}}
                          </div>
                  </div>
                @endif                  
              @endif
           </div>
          
            <!-- Content Header (Page header) -->
           
        
            <!-- Main content -->
            
              
              <div class="container-fluid">
                <div class="row">
                  <!-- /.col -->
          
                  <div class="col-md-12">
                    <div class="card card-default">
                     
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="callout callout-info bg-primary">
                          @if (Auth::user())
                              
                            @if (Auth::user()->Admin==1)
                            
                              <h5 class="font-italic"> <i class="fas fa-folder"></i> Dossier de l'Etudiant(e) {{ucfirst($Etudiant->nom)." ".ucfirst($Etudiant->postnom)." ".ucfirst($Etudiant->prenom)}}</h5>
                            @else
                              <h5> <i class="fas fa-edit"></i> Modification du dossier </h5>
                            @endif
                          @endif
          
                          
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
               
                <form action="{{url('updateDossierEtudiant')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                      <div class="card-body  text-dark">
                     
                          <fieldset class="border border-black-4 mb-3">
                              <legend class="font-italic bg-primary pl-3 pb-1 rounded"><i class="fas fa-file-alt"></i> Pièces de l'etudiant(e)</legend>
                                  <div class="row col-12">
                                      <div class="col-md-12 row justify-content-center">
                                         <div class="form-group col-lg-6 col-md-6 text-center">
                                            <label for="annee">Année Académique</label>
                                            <select name="annee_id" id="annee" class="form-control" required>
                                                @foreach ($Annees as $Annee)
                                                  <option value="{{$Annee->id}}" @if($Annee->id==$AnneeAcademique->id){{ 'selected' }} @endif>{{$AnneeAcademique->libAnnee}}</option>                                                 
                                                    
                                                @endforeach
                                              
                                              
                                              
                                            </select>
                                         </div>
                                         <div class="form-group col-lg-6 col-md-6 text-center">
                                          <label for="promotion">Promotion</label>
                                          <select name="promotion_id" id="annee" class="form-control @error('promotion') is-invalid @enderror" required>
                                            @foreach ($Promotions as $Promotion)
                                              <option value="{{$Promotion->id}}" @if($Promotion->id==$Inscription->promotion_id){{ "selected" }}@endif @if($Promotion->libpromotion=='L2-PADEM' || $Promotion->libpromotion=='L4-LMD'){{ "hidden" }}@endif>{{$Promotion->libpromotion}}</option>                                                 
                                            
                                            @endforeach
                                            
                                          </select>
                                       </div>
                                      </div>
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for=""> 
                                        <a href="@if($Elements->bulletin5e==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->bulletin5e)}}@endif">
                                            <img src="@if($Elements->bulletin5e==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->bulletin5e)}}@endif"  id="imageupload" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="bulletin5" class="custom-file-input" id="photo">
                                          <label for="photo" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Bulletin5</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                        
                           
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="">
                                        <a href="@if($Elements->bulletin6e==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->bulletin6e)}}@endif">
                                        
                                          <img src="@if($Elements->bulletin6e==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->bulletin6e)}}@endif" id="imageupload1" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="bulletin6" class="custom-file-input" id="photo1">
                                          <label for="photo1" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"> <i class="fas fa-file-alt"></i> Bulletin6</label>
                                      </div>
                                      
                                      </div>
                                      </div>
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="">
                                        <a href="@if($Elements->carteIdentite==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->carteIdentite)}}@endif">
                                          <img src="@if($Elements->carteIdentite==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->carteIdentite)}}@endif" id="imageupload2" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="carteidentite" class="custom-file-input" id="photo2">
                                          <label for="photo2" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Carte identité</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                    <div class="form-group col-md-3  col-sm-6 text-center">
                                      <label for="photo3">
                                        <a href="@if($Elements->demandeInscript==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->demandeInscript)}}@endif">
                                          <img src="@if($Elements->demandeInscript==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->demandeInscript)}}@endif" id="imageupload3" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="demandeinscription" class="custom-file-input" id="photo3">
                                          <label for="photo3" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Demande d'inscription</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                  
                              
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="photo4">
                                        <a href="@if($Elements->attestationStatut==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationStatut)}}@endif">
                                            <img src="@if($Elements->attestationStatut==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationStatut)}}@endif" id="imageupload4" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="attestmariage" class="custom-file-input" id="photo4">
                                          <label for="photo4" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Attestation M. ou Célibat</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="photo5">
                                        <a href="@if($Elements->attestationBCVM==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationBCVM)}}@endif">
                                          <img src="@if($Elements->attestationBCVM==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationBCVM)}}@endif" id="imageupload5" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="attestbcvm" class="custom-file-input" id="photo5">
                                          <label for="photo5" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Attestation BCV & Moeurs</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="photo6">
                                        <a href="@if($Elements->attestationNation==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationNation)}}@endif">
                                            <img src="@if($Elements->attestationNation==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationNation)}}@endif" id="imageupload6" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="attestnation" class="custom-file-input" id="photo6">
                                          <label for="photo6" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Attestation de Nationalité</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3 col-sm-6 text-center">
                                      <label for="photo7">
                                        <a href="@if($Elements->diplomeEtat==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->diplomeEtat)}}@endif">
                                            <img src="@if($Elements->diplomeEtat==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->diplomeEtat)}}@endif" id="imageupload7" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="diplomeetat" class="custom-file-input" id="photo7">
                                          <label for="photo7" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Diplôme d'état</label>
                                      </div>
                                      
                                      </div>
                                    </div>
                                   
                                    <div class="form-group col-md-3 text-center">
                                      <label for="photo8">
                                        <a href="@if($Elements->attestationNais==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationNais)}}@endif">
                                          <img src="@if($Elements->attestationNais==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->attestationNais)}}@endif" id="imageupload8" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="attestnais" class="custom-file-input" id="photo8">
                                          <label for="photo8" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Attestation de Naissance</label>
                                      </div>
                                      
                                      </div>
                                   </div>
                                    <div class="form-group col-md-3 text-center">
                                      <label for="photo9">
                                        <a href="@if($Elements->profil1==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil1)}}@endif">
                                          <img src="@if($Elements->profil1==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil1)}}@endif" id="imageupload9" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="profil1" class="custom-file-input" id="photo9">
                                          <label for="photo9" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Profil L1 LMD</label>
                                      </div>
                                      
                                      </div>
                                   </div>
                                    <div class="form-group col-md-3 text-center">
                                      <label for="photo10">
                                        <a href="@if($Elements->profil2==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil2)}}@endif">
                                          <img src="@if($Elements->profil2==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil2)}}@endif" id="imageupload10" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="profil2" class="custom-file-input" id="photo10">
                                          <label for="photo10" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Profil L2 LMD</label>
                                      </div>
                                      
                                      </div>
                                   </div>
                                    <div class="form-group col-md-3 text-center">
                                      <label for="photo11">
                                        <a href="@if($Elements->profil3==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil3)}}@endif">
                                          <img src="@if($Elements->profil3==null){{asset('images/logofichier.png')}}@else{{asset('uploads/ElementsDossierEtudiant/'.$Elements->profil3)}}@endif" id="imageupload11" class="img-fluid" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;">
                                        </a>
                                      </label>
                                      <div class="input-group">
                                      <div class="custom-file justify-content-center">
                                          <input type="file" hidden name="profil3" class="custom-file-input" id="photo11">
                                          <label for="photo11" class="text-center btn btn-outline-primary font-italic" style="cursor:pointer;"><i class="fas fa-file-alt"></i> Profil L3 LMD</label>
                                      </div>
                                      
                                      </div>
                                   </div>
                                   <div class="col-md-12">
                                      <input type="hidden" name="idOption" value="{{$Options->option_id}}" required class="form-control">
                                      <input type="hidden" name="etudiant_id" value="{{$Elements->etudiant_id}}" required class="form-control">
                                      <input type="hidden" name="Dossier_id" value="{{$Elements->id}}" required class="form-control">
                                   </div>
                                   
                                      
                          
                          <!-- /.card-body -->

                          <div class="mb-3 col-md-12">
                              <x-updatebtn />
                          </div>
                    </form>
                   
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            
            <!-- /.content -->
          
          
          <!-- /.card -->
       
        <!-- /.container-fluid -->
        <x-scriptuploaddocument />    
      </section
@endsection