@php
use App\Models\Etudiant;
use App\Models\Inscription;
@endphp
@extends("base")
@section("titre","Etudiant")
@section("titre_page","Etudiant | ".config('app.name'))
@section("sous_titre",config('app.name')."/Etudiant")
@section("content")

          <!-- left column -->
            <div class="col-md-12 ">
                <x-alertmessage />
                <div class="card text-light">
                    <div class="card-header row" style="background-color:rgb(12, 116, 161);">
                        <div class="col-lg-8 col-md-8">
                            <h4 class="font-italic"><i class="fas fa-user-plus"></i> Enregistrement Candidat</h4>
                        </div>
                        <div class="col-lg-2 col-md-2 text-md-left">
                            @if (Etudiant::where("id",session("IdEtudiant"))->count()>0)
                                 <a href="{{ url('optionpage') }}" class="font-italic text-light btn btn-outline-light"> <i class="fas fa-arrow"></i>Etape suivante</a>

                            @endif
                        </div>
                        <div class="col-lg-2 col-md-2 text-lg-right text-secondadry">
                            <span class="font-weight-bold font-italic">Etape 1/4</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('insertEtudiant')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body  text-dark" style="background-color: rgba(165, 165, 231, 0.536);">
                                <div class="form-group text-center rounded" style="background-color:rgb(12, 116, 161);">
                                    <label for="photo" class=""><img src="{{asset('dist/img/avatar.png')}}" id="imageupload" class="img-fluid @error('photo') is-invalid @enderror rounded-circle border border-3 border-light" alt="photo etudiant" style="cursor:pointer;width:120px; height:120px;"></label>
                                    <div class="input-group">
                                    <div class="custom-file justify-content-center">
                                        <input type="file" hidden name="photo" class="custom-file-input" id="photo">
                                        <label for="photo" class="text-center font-italic btn btn-outline-light" style="cursor:pointer;">Profil Candidat</label>
                                    </div>

                                    </div>
                                </div>
                                <fieldset class="border border-black-4 mb-3">
                                        <legend class="font-italic text-light underline rounded pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Identité Candidat</legend>
                                        <div class="row col-12">

                                            <div class="form-group col-md-6">
                                                <label for="nom">Nom</label>
                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" value="{{old('nom')}}" name="nom" id="nom" placeholder="Saisir votre nom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="PostNom">PostNom</label>
                                                <input type="text" class="form-control @error('postnom') is-invalid @enderror" value="{{old('postnom')}}" name="postnom" id="PostNom" placeholder="Saisir votre postnom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Prenom">Prénom</label>
                                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" value="{{old('prenom')}}" name="prenom" id="Prenom" placeholder="Saisir votre prénom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Sexe">Sexe</label>
                                                <select name="sexe" value="{{old('sexe')}}" id="Sexe" class="form-control @error('sexe') is-invalid @enderror">
                                                    <option value="F">Femme</option>
                                                    <option value="M">Homme</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Date">Date de naissaince</label>
                                                <input type="date" value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror" name="date" id="Date">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="tel">Téléphone Candidat</label>
                                                <input type="tel" class="form-control @error('teletudiant') is-invalid @enderror" value="{{old('teletudiant')}}" name="teletudiant" id="tel" placeholder="Ex: 0896071804" maxlength="10">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nationalite">Nationalité</label>
                                                <select name="nationalite" value="{{old('nationalite')}}" id="nationalite" class="form-control @error('nationalite') is-invalid @enderror">
                                                    <option value="Congolaise">Congolaise</option>
                                                    <option value="Autres">Autres</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pourcent">Pourcentage Obtenu</label>
                                                <input type="number" class="form-control @error('pourcent') is-invalid @enderror" value="{{old('pourcent')}}" name="pourcent" id="pourcent" placeholder="Ex: 60" min="50" max="100">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="province">Province d'origine</label>
                                                <select name="province" value="{{old('province')}}" id="province" class="form-control @error('province') is-invalid @enderror">
                                                    <option value="Kongo-Central">Kongo-Central</option>
                                                    <option value="Kinshasa">Kinshasa</option>
                                                    <option value="Sud-kivu">Sud-kivu</option>
                                                    <option value="Nord-kivu">Nord-kivu</option>
                                                    <option value="Lualaba">Lualaba</option>
                                                    <option value="Sub Ubangi">Sub Ubangi</option>
                                                    <option value="Nord Ubangi">Nord Ubangi</option>
                                                    <option value="Kwilu">Kwilu</option>
                                                    <option value="Haut-Katanga">Haut-Katanga</option>
                                                    <option value="Haut-Katanga">Haut-Lomami</option>
                                                    <option value="Haut-Uélé">Haut-Uélé</option>
                                                    <option value="Bas-Uélé">Bas-Uélé</option>
                                                    <option value="Province Orientale">Province Orientale</option>
                                                    <option value="Tshuapa">Tshuapa</option>
                                                    <option value="Mai-ndombe">Mai-ndombe</option>
                                                    <option value="Tshopo">Tshopo</option>
                                                    <option value="Kwango">Kwango</option>
                                                    <option value="Sankuru">Kwango</option>

                                                </select>
                                           </div>
                                           <div class="form-group col-md-6">
                                                <label for="territoire">Territoire d'origine</label>
                                                <input type="text" class="form-control @error('territoire') is-invalid @enderror" value="{{old('territoire')}}" name="territoire" id="territoire" placeholder="Ex: Mbanza-Ngungu" max="30">
                                           </div>

                                        </div>
                                </fieldset>


                                <fieldset class="border border-5">
                                    <legend class="font-italic text-light decoration-underline rounded pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Renseignements Ecole</legend>
                                    <div class="col-md-12 row">
                                                <div class="form-group col-md-6">
                                                    <label for="ecole">Ecole de Provenance</label>
                                                    <input type="text" placeholder="Ex : Edap/ ISP Mbanza-Ngungu" name="ecole" value="{{old('ecole')}}" id="ecole" class="form-control @error('ecole') is-invalid @enderror" />


                                               </div>
                                               <div class="form-group col-md-6">
                                                <label for="option">Option Faite au Secondaire</label>
                                                <input type="text" name="option" placeholder="Ex: Commerciale & Gestion" value="{{old('option')}}" id="option" class="form-control @error('option') is-invalid @enderror" />

                                               </div>
                                               <div class="form-group col-md-6">
                                                    <label for="adresseEcole">Adresse Ecole</label>
                                                    <input type="text" class="form-control @error('adresseEcole') is-invalid @enderror" maxlength="50"  value="{{old('adresseEcole')}}" name="adresseEcole" id="adresseEcole" placeholder="Ex: Av. mueneditu 45 Q\Disengomoka">
                                               </div>
                                               <div class="form-group col-md-6">
                                                    <label for="territoireEcole">Territoire Ecole</label>
                                                    <input type="text" maxlength="50" class="form-control @error('territoireEcole') is-invalid @enderror"  value="{{old('territoireEcole')}}" name="territoireEcole" id="territoireEcole" placeholder="Ex: Mbanza-Ngungu">
                                               </div>




                                    </div>
                                </fieldset>
                                <fieldset class="border border-5">
                                    <legend class="font-italic text-light decoration-underline rounded pl-3 pb-1" style="background-color:rgb(12, 116, 161);"><i class="fas fa-file-alt"></i> Identité Parent-tutaire</legend>
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label for="nompere">Nom du père</label>
                                            <input type="nompere" class="form-control @error('nompere') is-invalid @enderror" value="{{old('nompere')}}" name="nompere" id="nompere" placeholder="Saisir le nom du père">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nommere">Nom de la mère</label>
                                            <input type="text" class="form-control @error('nommere') is-invalid @enderror" value="{{old('nommere')}}" name="nommere" id="nommere" placeholder="Saisir le nom de la mère">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="teltutaire">Téléphone tutaire</label>
                                            <input type="tel" maxlength="10" class="form-control @error('teltutaire') is-invalid @enderror" value="{{old('teltutaire')}}"  name="teltutaire" id="teltutaire" placeholder="Ex: 0896071804">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="adressetutaire">Adresse tutaire</label>
                                            <input type="text" class="form-control @error('adressetutaire') is-invalid @enderror"  value="{{old('adressetutaire')}}" name="adressetutaire" id="adressetutaire" placeholder="Ex: Av. mueneditu 45 Q\Disengomoka">
                                        </div>
                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control">

                                    </div>
                                </fieldset>


                                <!-- /.card-body -->

                                <div class="mt-3 rounded my-2" style="background-color:rgb(12, 116, 161);">
                                    @if (Etudiant::where("id",session("IdEtudiant"))->count()<1)
                                         <x-savebtn />
                                    @endif
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
