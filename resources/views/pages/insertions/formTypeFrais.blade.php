@extends("base")
@section("titre","Frais")
@section("sous_titre",config('app.name')."/Frais")
@section("content")

<div class="card" style="width:100%;" >
    <x-alertmessage />
    <div class=" bg-primary pt-1">
        <p class="h4 ml-3 font-italic p-2"> <i class="fas fa-credit-card"></i> Frais</p>
    </div>
    
    <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary mt-3">
                <div class="card-header">
                  <h4 class="font-italic"> <i class="fas fa-credit-card"></i> Définition Des Frais</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url("insertTypeFrais")}}" autocomplete="off">
                    @csrf
                  <div class="card-body">


                    
                    <div class="form-group">
                       
                      <label for="motif">Motif</label>                      
                      <select name="motif" id="motif" class="form-control @error('motif') is-invalid @enderror" required>
                            <option value="Frais Administratif">Frais Administratif</option>
                            <option value="Frais Académique">Frais Académiques L1 LMD</option>
                            <option value="Frais Académique">Frais Académiques L2 LMD</option>
                            <option value="Frais Académique">Frais Académiques L3 LMD</option>
                            <option value="Frais Académique">Frais Académiques L4 LMD</option>
                            <option value="Frais Académique">Frais Académiques L1 PADEM</option>
                            <option value="Frais Académique">Frais Académiques L2 PADEM</option>
                            <option value="Frais Attestation Physique">Frais Attestation Physique</option>
                            <option value="Frais Concours Test">Frais Concours Test</option>
                            <option value="Frais Enrolement">Frais Enrolement</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="montant">Montant Frais</label>
                      <input type="number" min="5" name="montant" id="montant" class="form-control @error('motif') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                      <label for="montant">Année Académique</label>
                      
                      <select name="annee_id" id="annee_id" class="form-control @error('motif') is-invalid @enderror" required>
                        @foreach ($Annees as $Annee)                            
                             <option value="{{ $Annee->id }}">{{ $Annee->libAnnee }}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="promotion_id">Promotion</label>
                        <select name="promotion_id" id="promotion_id" class="form-control @error('promotion_id') is-invalid @enderror" required>
                              <option value="255">Toutes les promotions</option>
                              @foreach ($Promotions as $Promotion)                            
                                  <option value="{{ $Promotion->id }}">{{ $Promotion->libpromotion }}</option>
                              @endforeach
                        </select>
                    </div>                         
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="mb-3">
                    <x-savebtn />
                  </div>
                </form>
                <div class="social-auth-links text-center mb-3">
          
                    <a href="{{url('affichefrais')}}" class="btn btn-block btn-info">
                      <i class="fas fa-file-alt mr-2"></i> Liste des frais
                    </a>
                    
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
@endsection