@extends("base")
@section("titre","Option")
@section("sous_titre",config('app.name')."/option")
@section("content")

<div class="card" style="width:100%;" >
    <x-alertmessage />
    <div class="card-header row bg-primary mb-3" >
          <div class="col-lg-6 col-md-6">
            <h4 class="font-italic">Paiement frais</h4>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-right text-secondadry">
            <span class="font-weight-bold font-italic">Etape 4/4</span>
        </div>
    </div>
    <div class="font-italic"></div>
    <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h4 class=""> <i class="fas fa-credit-card"></i>Modification Paiement</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url("updatePayement")}}" autocomplete="off">
                    @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputPassword2">Montant à payer</label>
                      <input type="number" name="montantPayer" value="{{$payement->montantPayer}}" class="form-control" id="exampleInputPassword2" placeholder="Montant apyer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword3">référence paiement / code transfere</label>
                      <input type="text" name="refPayer" value="{{$payement->refPayer}}" class="form-control" id="exampleInputPassword3" placeholder="référence paiement / code transfere">
                    </div>
                    <div class="form-group">
                      <label for="etud">Etudiants</label>                        

                      <select name="etudiant_id" id="etud" class="form-control">
                            <option value="{{$Etudiants->id}}">{{$Etudiants->nom." ".$Etudiants->postnom." ".$Etudiants->prenom}}</option>
                      </select>                       
                    
                    </div>
                    <div class="form-group">
                       
                      <label for="exampleInputPassword4">Motif | Tranche à payer</label>                      
                      <select  id="tranche" name="IdTranche" class="form-control" required>
                        @foreach ($Tranches as $Tranche)                            
                           <option value="{{$Tranche->id}}" @if($TranchePayement->id==$Tranche->id){{'selected'}}@endif>{{$Tranche->libTranche.' | '.$Tranche->montantTranche}}</option>
                        @endforeach
                          
                      </select>
                    </div>
                    <input type="hidden" name="payer_id" value="{{$TranchePayement->id}}" class="form-control" id="">
                  </div>
                  <!-- /.card-body -->
  
                  <div class="mb-3">
                    <x-updatebtn />
                  </div>
                </form>
                <div class="social-auth-links text-center mb-3">
          
                    <a href="{{url('afficherListePayement')}}" class="btn btn-block btn-info">
                      <i class="fas fa-file-alt mr-2"></i> Liste des paiements
                    </a>
                    
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
@endsection