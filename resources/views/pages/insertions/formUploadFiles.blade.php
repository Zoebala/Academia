@php
use App\Models\Inscription;    
@endphp
@extends('base')
@section("titre","Documents")
@section("titre_page","Eléments Dossier | ".config('app.name'))
@section("sous_titre",config('app.name')."/Document")

@section('content')
    
       
  {{-- <section class="content" style="width:100%;" > --}}
     
    <div class="col-md-12 gap-bottom-0" style="background:url('dist/img/bg3.jpeg');">
      <x-alertmessage />
              <div class="card">
                  <div class="card-header row text-light" style="background-color:rgb(12, 116, 161);">
                      
                      <div class="col-lg-8 col-md-8">
                          <h4 class="font-italic">Votre dossier @if(session('Etudiant')){{session('Etudiant')}}@endif </h4>
                      </div>
                      <div class="col-lg-2 col-md-2 text-lg-right text-secondadry">
                          @if (Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0)
                            <a href="{{ url("formPayement/".session("IdEtudiant")) }}" class="font-italic btn btn-outline-light">Etape suivante</a>                            
                          @endif
                      </div>
                      <div class="col-lg-2 col-md-2 text-lg-right text-secondadry">
                          <span class="font-weight-bold font-italic">Etape 3/4</span>
                      </div>
                  </div>
              </div>
                <div class="row">
                  
          
                  <div class="col-md-12" >
                    <div class="card card-default" style="background-color:rgb(12, 116, 161);">
                      <div class="card-header text-light">
                        <h3 class="card-title">
                          <i class="fas fa-bullhorn"></i>
                          A Lire
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="callout callout-info text-light rounded" style="background-color:rgb(12, 116, 161);">
                          <h5> Veuillez nous fournir les élements de votre dossier </h5>
          
                          <p>Pour nous permettre de traiter votre candidature, vous devez nous fournir 
                            <i>une demande d'inscription écrite à la main ; une copie du diplôme d'Etat ou extrait du journal officiel
                              des résultats de l'examen d'Etat ; une copie des bulletin de 5<sup>ème</sup> et 6<sup>ème</sup> secondaire ;
                              une copie de la carte d'identité ; une attestation de naissance ; une attestation de bonne conduite, vie et moeurs ;
                              une attestation de nationnalité ; une attestation de célibat ou de mariage
                            </i> les fichiers doivent être en format Pdf, nous n'acceptons pas d'autres types de fichiers</p>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                
                <form action="{{route('insertdossier')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                      <div class="card-body  text-light rounded" style="background:linear-gradient(rgb(12, 116, 161),rgb(82, 152, 202),rgba(8, 8, 127, 0.776))">
                     
                          <fieldset class="border border-black-4 mb-3">
                              <legend class="font-italic">Pièces Etudiant</legend>
                                  <div class="row col-12">
                                          <div class="col-md-12 row justify-content-center">
                                            <div class="form-group col-lg-6 col-md-6 text-center">
                                                <label for="annee">Année Académique</label>
                                                <select name="annee" id="annee" class="form-control" required>
                                                  @foreach ($Annees as $item)
                                                    <option value="{{$item->id}}">{{$item->libAnnee}}</option>                                                
                                                  
                                                  @endforeach
                                                  
                                                </select>
                                             </div>
                                            <div class="form-group col-lg-6 col-md-6 text-center">
                                                <label for="promotion">Promotion</label>
                                                <select name="promotion_id" id="annee" class="form-control @error('promotion') is-invalid @enderror" required>
                                                  @foreach ($Promotions as $Promotion)
                                                    <option value="{{$Promotion->id}}" @if($Promotion->libpromotion=='L2-PADEM' || $Promotion->libpromotion=='L4-LMD'){{ "hidden" }}@endif>{{$Promotion->libpromotion}}</option>                                                 
                                                  
                                                  @endforeach
                                                  
                                                </select>
                                             </div>
                                          </div>
                                            <div class="form-group col-md-3 col-sm-6 text-center">
                                              <label for="photo"><img src="{{asset('images/logofichier.png')}}" id="imageupload" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                              <div class="custom-file justify-content-center">
                                                  <input type="file" hidden name="bulletin5" class="custom-file-input" id="photo">
                                                  <label for="photo" class="text-center" style="cursor:pointer;">Bulletin5</label>
                                              </div>
                                              
                                              </div>
                                            </div>
                        
                           
                                            <div class="form-group col-md-3 col-sm-6 text-center">
                                              <label for="photo1"><img src="{{asset('images/logofichier.png')}}" id="imageupload1" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                              <div class="custom-file justify-content-center">
                                                  <input type="file" hidden name="bulletin6" class="custom-file-input" id="photo1">
                                                  <labeL for="photo" class="text-center" style="cursor:pointer;">Bulletin6</labeL>
                                              </div>
                                              
                                              </div>
                                            </div>
                                          <div class="form-group col-md-3 col-sm-6 text-center">
                                            <label for="photo2"><img src="{{asset('images/logofichier.png')}}" id="imageupload2" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                            <div class="input-group">
                                            <div class="custom-file justify-content-center">
                                                <input type="file" hidden name="carteidentite" class="custom-file-input" id="photo2">
                                                <label for="photo" class="text-center" style="cursor:pointer;">Carte identité</label>
                                            </div>
                                            
                                            </div>
                                          </div>
                                          <div class="form-group col-md-3  col-sm-6 text-center">
                                            <label for="photo3"><img src="{{asset('images/logofichier.png')}}" id="imageupload3" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                            <div class="input-group">
                                            <div class="custom-file justify-content-center">
                                                <input type="file" hidden name="demandeinscription" class="custom-file-input" id="photo3">
                                                <label for="photo" class="text-center" style="cursor:pointer;">Demande d'inscription</label>
                                            </div>
                                            
                                            </div>
                                          </div>
                                  
                              
                                        <div class="form-group col-md-3 col-sm-6 text-center">
                                          <label for="photo4"><img src="{{asset('images/logofichier.png')}}" id="imageupload4" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                          <div class="input-group">
                                          <div class="custom-file justify-content-center">
                                              <input type="file" hidden name="attestmariage" class="custom-file-input" id="photo4">
                                              <label for="photo" class="text-center" style="cursor:pointer;">Attestation de mariage ou célibat</label>
                                          </div>
                                          
                                          </div>
                                        </div>
                                          <div class="form-group col-md-3 col-sm-6 text-center">
                                            <label for="photo5"><img src="{{asset('images/logofichier.png')}}" id="imageupload5" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                            <div class="input-group">
                                            <div class="custom-file justify-content-center">
                                                <input type="file" hidden name="attestbcvm" class="custom-file-input" id="photo5">
                                                <label for="photo" class="text-center" style="cursor:pointer;">Attestation BCV & Moeurs</label>
                                            </div>
                                            
                                            </div>
                                          </div>
                                        <div class="form-group col-md-3 col-sm-6 text-center">
                                          <label for="photo6"><img src="{{asset('images/logofichier.png')}}" id="imageupload6" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                          <div class="input-group">
                                          <div class="custom-file justify-content-center">
                                              <input type="file" hidden name="attestnation" class="custom-file-input" id="photo6">
                                              <label for="photo" class="text-center" style="cursor:pointer;">Attestation Nationalite</label>
                                          </div>
                                          
                                          </div>
                                        </div>
                                    
                                        <div class="form-group col-md-3 col-sm-6 text-center">
                                          <label for="photo7"><img src="{{asset('images/logofichier.png')}}" id="imageupload7" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                          <div class="input-group">
                                          <div class="custom-file justify-content-center">
                                              <input type="file" hidden name="diplomeetat" class="custom-file-input" id="photo7">
                                              <label for="photo" class="text-center" style="cursor:pointer;">Diplôme d'état/Extrait J.Officiel</label>
                                          </div>
                                          
                                          </div>
                                        </div>
                                   
                                          <div class="form-group col-md-3 text-center">
                                              <label for="photo8"><img src="{{asset('images/logofichier.png')}}" id="imageupload8" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                                  <div class="custom-file justify-content-center">
                                                      <input type="file" hidden name="attestnais" class="custom-file-input" id="photo8">
                                                      <label for="photo" class="text-center" style="cursor:pointer;">Attestation Naissance</label>
                                                  </div>
                                              
                                              </div>
                                          </div>
                                          <div class="form-group col-md-3 text-center">
                                              <label for="photo9"><img src="{{asset('images/logofichier.png')}}" id="imageupload9" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                                  <div class="custom-file justify-content-center">
                                                      <input type="file" hidden name="profil1" class="custom-file-input" id="photo9">
                                                      <label for="photo9" class="text-center" style="cursor:pointer;">Profil L1 LMD</label>
                                                  </div>
                                              
                                              </div>
                                          </div>
                                          <div class="form-group col-md-3 text-center">
                                              <label for="photo10"><img src="{{asset('images/logofichier.png')}}" id="imageupload10" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                                  <div class="custom-file justify-content-center">
                                                      <input type="file" hidden name="profil2" class="custom-file-input" id="photo10">
                                                      <label for="photo10" class="text-center" style="cursor:pointer;">Profil L2 LMD</label>
                                                  </div>
                                              
                                              </div>
                                          </div>
                                          <div class="form-group col-md-3 text-center">
                                              <label for="photo11"><img src="{{asset('images/logofichier.png')}}" id="imageupload11" class="img-fluid rounded" alt="photo etudiant" style="cursor:pointer;width:100px; height:100px;"></label>
                                              <div class="input-group">
                                                  <div class="custom-file justify-content-center">
                                                      <input type="file" hidden name="profil3" class="custom-file-input" id="photo10">
                                                      <label for="photo11" class="text-center" style="cursor:pointer;">Profil L3 LMD</label>
                                                  </div>
                                              
                                              </div>
                                          </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="idOption" value="{{$idOption}}" required>
                                            <input type="hidden" name="etudiant_id" value="{{$idEtudiant}}" required>
                                        </div>
                                   
                                      
                          
                          <!-- /.card-body -->

                                      <div class="mb-3 col-md-12">
                                        @if (Inscription::where("etudiant_id",session("IdEtudiant"))->count()<1)
                                          <x-savebtn />
                                            
                                        @endif
                                      </div>
                          </fieldset>
                      </div>
                 </form>
                   
                <!-- /.row -->
              </div>
             
             <!-- /.container-fluid -->
        </div>
        <x-scriptuploaddocument />  
         
  {{-- </section --}}
              
@endsection