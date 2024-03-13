@php
use App\Models\Frais;
    
@endphp
@extends("base")
@section("titre","Option")
@section("sous_titre",config('app.name')."/option")
@section("content")

<div class="card" style="width:100%;background:linear-gradient(rgb(12, 116, 161),white,rgba(8, 8, 127, 0.776),rgb(12, 116, 161))">
    <x-alertmessage />
    <div class="card-header text-light row mb-3" style="background-color:rgb(12, 116, 161);">
          <div class="col-lg-6 col-md-6">
            <h4 class="font-italic"><i class="fas fa-credit-card"></i> Paiement</h4>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-right text-secondadry">
          {{-- lorsque l'étudiant paye ses frais étape 4 disparait --}}
           @if (!Frais::where("etudiant_id",session("IdEtudiant"))->exists())
              <span class="font-weight-bold font-italic">Etape 4/4</span>
           
           @endif
        </div>
    </div>
    <div class="font-italic"></div>
    <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card" style="background-color: rgba(165, 165, 231, 0.536);">
                <div class="card-header text-light" style="background-color:rgb(12, 116, 161);">
                  <h4 class=""> <i class="fas fa-credit-card"></i> Paiement</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route("insertPayement")}}" autocomplete="off">
                    @csrf
                  <div class="card-body">


                    
                    <div class="form-group">
                       
                      <label for="annee_id">Année Académique</label>

                      <select id="annee_id" name="annee_id" class="form-control @error('annee_id') is-invalid @enderror" required>
                            @foreach ($Annees as $Annee)  
                                                        
                              <option value="{{$Annee->id}}" @if($Annee->id==$Promo_id->annee_id){{ 'selected' }}@endif>{{$Annee->libAnnee}}</option>
                            @endforeach
                          
                      </select>
                    </div>
                    <div class="form-group">
                       
                      <label for="promo">Promotion</label>

                      <select id="promo" name="promotion_id" class="form-control @error('promotion_id') is-invalid @enderror" required>
                            @foreach ($Promotions as $Promo)  
                                                        
                              <option value="{{$Promo->id}}" @if($Promo->id==$Promo_id->promotion_id){{ 'selected' }}@endif>{{$Promo->libpromotion}}</option>
                            @endforeach
                          
                      </select>
                    </div>
                    <div class="form-group">
                       
                      <label for="motif">Motif Payement</label>
                      
                      <select  id="motif" name="motif" class="form-control @error('motif') is-invalid @enderror" required >
                          @foreach ($Frais as $F)  
                                                      
                            <option value="{{$F->Motif}}">{{$F->Motif.' | '.$F->Montanttypefrais}}</option>
                          @endforeach
                          
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="montant">Montant à payer | Tranche à payer</label>
                      <input type="number" name="montantPayer" value="{{old('montantPayer')}}" class="form-control @error('montantPayer') is-invalid @enderror" id="montant" placeholder="Montant à payer">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputPassword3">référence paiement / code transfere</label>
                      <input type="text" name="refPayer" value="{{old('refPayer')}}" class="form-control" id="exampleInputPassword3" placeholder="référence paiement / code transfere">
                    </div> --}}
                   
                       
                            <div class="form-group">
                              @if (Auth::user()->Admin==1)
                                  <label for="etud">Etudiant</label>
                              @endif
                            @php
                                $noms=session("Etudiant");
                                $idEtudiant=session("IdEtudiant");
                          @endphp
                          <input type="text"  @if (Auth::user()->Admin==0){{ 'hidden' }}@endif name="etudiant_id" value="{{$idEtudiant}}"  list="etudiant"  id="etud" class="form-control">

                            <datalist name="etudiant" id="etudiant">                                                   
                                  @if (isset($Etudiants))
                                      
                                    @foreach($Etudiants as $Etudiant)   
                                    <option value="{{$Etudiant->id}}">{{$Etudiant->nom." ".$Etudiant->postnom." ".$Etudiant->prenom}}</option> 
                                    @endforeach
                                  @endif          
                                                      
                            </datalist>
                        
                        </div>
                            
                                              
                  
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="mb-3">
                    <x-savebtn />
                  </div>
                </form>
                <hr class="bg-light">
                <div class="social-auth-links text-center" >
                  
                    <a href="{{url('afficherListePayement')}}" class="btn btn-block text-light">
                      <i class="fas fa-file-alt mr-2" ></i> Mes paiements
                    </a>
                    
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
@endsection