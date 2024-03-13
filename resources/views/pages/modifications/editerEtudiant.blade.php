@extends("base")
@section("titre","ModificationEtudiant")
@section("titre_page","ModificationEtudiant | ".config('app.name'))
@section("sous_titre",config('app.name')."/Etudiant")
@section("content")
       
          <!-- left column -->
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <x-alertmessage />
                    <div class="card-header" style="background-color:rgb(12, 116, 161);">
                        @if (Auth::user()->Admin==0)
                            <h3 class="card-title font-italic"><i class="fas fa-edit"></i> Modification Etudiant</h3>
                        @else
                            <h3 class="card-title font-italic"><i class="fas fa-file"></i> Information de L'étudiant(e) {{$Etudiant->nom.' '.$Etudiant->postnom.' '.$Etudiant->prenom}}</h3>
                            
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('updateEtud')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body  text-dark"  style="background-color: rgba(165, 165, 231, 0.536);">
                       <div class="form-group text-center rounded" style="background-color:rgb(12, 116, 161);">
                            <a href="{{asset('uploads/etudiant/'.$Etudiant->photo)}}">
                                <label for=""><img src="{{asset('uploads/etudiant/'.$Etudiant->photo)}}" id="imageupload" class="img-fluid rounded-circle @error('photo') is-invalid @enderror" alt="photo etudiant" style="cursor:pointer;width:130px; height:130px;"></label>
                            </a>
                            <div class="input-group">
                            <div class="custom-file justify-content-center">
                                <input type="file" hidden name="photo" class="custom-file-input" id="photo">
                                <label for="photo" class="text-center font-italic text-white btn btn-outline-light" style="cursor:pointer;"><i class="fas fa-edit"></i> Modifier Profil</label>
                            </div>
                            
                            </div>
                        </div>
                        <fieldset class="border border-black-4 mb-3">
                                <legend class="font-italic text-light rounded pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Identité Etudiant</legend>
                                <div class="row col-12">

                                    <div class="form-group col-md-6">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" value="{{$Etudiant->nom}}" name="nom" id="nom" placeholder="saisir un nom">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="PostNom">PostNom</label>
                                        <input type="text" class="form-control @error('postnom') is-invalid @enderror" value="{{$Etudiant->postnom}}" name="postnom" id="PostNom" placeholder="Saisir votre postnom">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prenom">Prénom</label>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" value="{{$Etudiant->prenom}}" name="prenom" id="Prenom" placeholder="Saisir le prénom">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Sexe">Sexe</label>
                                        <select name="sexe" id="Sexe" class="form-control @error('sexe') is-invalid @enderror">
                                            <option value="F" @if($Etudiant->sexe=="F"){{'selected'}}@endif>Femme</option>
                                            <option value="M" @if($Etudiant->sexe=="M"){{'selected'}}@endif>Homme</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Date">Date de naissaince</label>
                                        <input type="date" value="{{$Etudiant->datenais}}" class="form-control @error('date') is-invalid @enderror" name="date" id="Date">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tel">Téléphone étudiant</label>
                                        <input type="tel" class="form-control @error('teletudiant') is-invalid @enderror" value="{{$Etudiant->teletudiant}}" name="teletudiant" id="tel" placeholder="Saisir le numéro téléphonique">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nationalite">Nationalité</label>
                                        <select name="nationalite"  id="nationalite" class="form-control @error('nationalite') is-invalid @enderror">
                                            <option value="Congolaise" @if($Etudiant->nationalite=="Congolaise"){{'selected'}}@endif>Congolaise</option>
                                            <option value="Autres" @if($Etudiant->nationalite=="Autres"){{'selected'}}@endif>Autres</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pourcent">Pourcentage Obtenu</label>
                                        <input type="number" class="form-control @error('pourcent') is-invalid @enderror" value="{{$Etudiant->pourcentage}}" name="pourcent" id="pourcent" placeholder="Ex: 60" min="50" max="100">
                                    </div>
                                  
                                    
                                    <div class="form-group col-md-6">
                                        <label for="province">Province d'origine</label>
                                        <select name="province" value="{{old('province')}}" id="province" class="form-control @error('province') is-invalid @enderror">
                                            <option value="Kongo-Central" @if($Etudiant->province=='Kongo-Central'){{ 'selected' }}@endif>Kongo-Central</option>
                                            <option value="Kinshasa" @if($Etudiant->province=='Kinshasa'){{ 'selected' }}@endif>Kinshasa</option>
                                            <option value="Sud-kivu" @if($Etudiant->province=='Sud-kivu'){{ 'selected' }}@endif>Sud-kivu</option>
                                            <option value="Nord-kivu" @if($Etudiant->province=='Nord-kivu'){{ 'selected' }}@endif>Nord-kivu</option>
                                            <option value="Lualaba" @if($Etudiant->province=='Lualaba'){{ 'selected' }}@endif>Lualaba</option>
                                            <option value="Sub Ubangi"  @if($Etudiant->province=='Sub Ubangi'){{ 'selected' }}@endif>Sub Ubangi</option>
                                            <option value="Nord Ubangi" @if($Etudiant->province=='Nord Ubangi'){{ 'selected' }}@endif>Nord Ubangi</option>
                                            <option value="Kwilu" @if($Etudiant->province=='Kwilu'){{ 'selected' }}@endif>Kwilu</option>
                                            <option value="Haut-Katanga" @if($Etudiant->province=='Haut-Katanga'){{ 'selected' }}@endif>Haut-Katanga</option>                                                   
                                            <option value="Haut-Lomami" @if($Etudiant->province=='Haut-Lomami'){{ 'selected' }}@endif>Haut-Lomami</option>                                                   
                                            <option value="Haut-Uélé" @if($Etudiant->province=='Haut-Uélé'){{ 'selected' }}@endif>Haut-Uélé</option>                                                   
                                            <option value="Bas-Uélé" @if($Etudiant->province=='Bas-Uélé'){{ 'selected' }}@endif>Bas-Uélé</option>                                                   
                                            <option value="Province Orientale" @if($Etudiant->province=='Province Orientale'){{ 'selected' }}@endif>Province Orientale</option>                                                   
                                            <option value="Tshuapa" @if($Etudiant->province=='Tshuapa'){{ 'selected' }}@endif>Tshuapa</option>                                                   
                                            <option value="Mai-ndombe" @if($Etudiant->province=='Mai-ndombe'){{ 'selected' }}@endif>Mai-ndombe</option>                                                   
                                            <option value="Tshopo" @if($Etudiant->province=='Tshopo'){{ 'selected' }}@endif>Tshopo</option> 
                                            <option value="Kwango" @if($Etudiant->province=='Kwango'){{ 'selected' }}@endif>Kwango</option>                                                   
                                                    <option value="Sankuru" @if($Etudiant->province=='Sankuru'){{ 'selected' }}@endif>Sankuru</option>                                                   
                                            
                                        </select>                     
                                   </div>
                                   <div class="form-group col-md-6">
                                    <label for="territoire">Territoire d'origine</label>
                                    <input type="text" class="form-control @error('territoire') is-invalid @enderror" value="{{$Etudiant->territoire}}" name="territoire" id="territoire" placeholder="Ex: Mbanza-Ngungu" max="30">
                                   </div>

                                </div>
                        </fieldset>
                        <fieldset class="border border-5">
                            <legend class="font-italic decoration-underline text-light rounded pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Renseignements Ecole</legend>
                            <div class="col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label for="ecole">Ecole de Provenance</label>
                                            <input type="text" placeholder="Ex : Edap/ ISP Mbanza-Ngungu" name="ecole" value="{{$Etudiant->ecole}}" id="ecole" class="form-control @error('ecole') is-invalid @enderror" />
                                               
                                                              
                                       </div>
                                       <div class="form-group col-md-6">
                                        <label for="option">Option Faite au Secondaire</label>
                                        <input type="text" name="option" placeholder="Ex: Commerciale & Gestion" value="{{$Etudiant->optionSecondaire}}" id="option" class="form-control @error('option') is-invalid @enderror" />
                                                              
                                       </div>
                                       <div class="form-group col-md-6">
                                            <label for="adresseEcole">Adresse Ecole</label>
                                            <input type="text" class="form-control @error('adresseEcole') is-invalid @enderror"  value="{{$Etudiant->adresseEcole}}" name="adresseEcole" id="adresseEcole" placeholder="Ex: Av. mueneditu 45 Q\Disengomoka">
                                       </div>
                                       <div class="form-group col-md-6">
                                            <label for="territoireEcole">Territoire Ecole</label>
                                            <input type="text" class="form-control @error('territoireEcole') is-invalid @enderror"  value="{{$Etudiant->territoireEcole}}" name="territoireEcole" id="territoireEcole" placeholder="Ex: Mbanza-Ngungu">
                                       </div>

                                
                                

                            </div>
                        </fieldset>
                        <fieldset class="border border-5">
                            <legend class="font-italic rounded text-light pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Identité Parent-tutaire</legend>
                            <div class="col-md-12 row">
                                <div class="form-group col-md-6">
                                    <label for="nompere">Nom du père</label>
                                    <input type="nompere" class="form-control @error('nompere') is-invalid @enderror" value="{{$Etudiant->nompere}}" name="nompere" id="nompere" placeholder="Saisir le nom du père">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nommere">Nom de la mère</label>
                                    <input type="text" class="form-control @error('nommere') is-invalid @enderror" value="{{$Etudiant->nommere}}" name="nommere" id="nommere" placeholder="Saisir le nom de la mère">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="teltutaire">Téléphone tutaire</label>
                                    <input type="tel" class="form-control @error('teltutaire') is-invalid @enderror" value="{{$Etudiant->teltutaire}}"  name="teltutaire" id="teltutaire" placeholder="Saisir le numéro du tutaire">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="adressetutaire">Adresse tutaire</label>
                                    <input type="text" class="form-control @error('adressetutaire') is-invalid @enderror"  value="{{$Etudiant->adresse}}" name="adressetutaire" id="adressetutaire" placeholder="Ex:av. mueneditu 45 Q\Disengomoka">
                                </div>
                                <input type="hidden" value="{{$Etudiant->id}}" name="idEtud" class="form-control">


                            </div>
                        </fieldset>
                       
                        
                        <!-- /.card-body -->

                        <div class="mt-3" style="background-color:rgb(12, 116, 161);">
                            <x-updatebtn />
                        </div>
                    </form>
                    </div>
                    @if (Auth::user()->admin==1)
                        
                        <div class="social-auth-links text-center mb-3">
                            
                            <a href="{{url('afficheEtudiant')}}" class="btn btn-block btn-info">
                                <i class="fas fa-file-alt me-2"></i> Liste des Etudiants
                            </a>
                            
                        </div>
                    @endif
                </div>
            </div>
            <x-visualiserupload />
     
@endsection