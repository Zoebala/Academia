@extends("base")
@section("titre","editerFrais")
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
                  <h4 class="font-italic"> <i class="fas fa-edit"></i> Modification Frais</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url("updateTypeFrais")}}" autocomplete="off">
                    @csrf
                  <div class="card-body">


                    
                    <div class="form-group">
                       
                      <label for="motif">Motif</label>                      
                      <select name="motif" id="motif" class="form-control @error('motif') is-invalid @enderror" required>
                            <option value="Frais Inscription" @if($Frais->Motif=='Frais Inscription'){{ "selected" }}@endif>Frais Inscription</option>
                            <option value="Frais Académique" @if($Frais->Motif=='Frais Académique'){{ "selected" }}@endif>Frais Académique</option>
                            <option value="Frais Attestation Physique" @if($Frais->Motif=='Frais Attestation Physique'){{ "selected" }}@endif>Frais Attestation Physique</option>
                            <option value="Frais Concours Test" @if($Frais->Motif=='Frais Concours Test'){{ "selected" }}@endif>Frais Concours Test</option>
                            <option value="Frais Enrolement" @if($Frais->Motif=='Frais Enrolement'){{ "selected" }}@endif>Frais Enrolement</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="montant">Montant Frais</label>
                      <input type="number" min="5" name="montant" value="{{ $Frais->Montanttypefrais }}" id="montant" class="form-control @error('motif') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                      <label for="montant">Année Académique</label>
                      
                      <select name="annee_id" id="annee_id" class="form-control @error('motif') is-invalid @enderror" required>
                        @foreach ($Annees as $Annee)                            
                             <option value="{{ $Annee->id }}" @if($Annee->id==$Frais->annee_id){{ "selected" }}@endif>{{ $Annee->libAnnee }}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="promotion_id">Promotion</label>
                        <input type="text" name="promotion_id" class="form-control @error('promotion_id') is-invalid @enderror" value="{{ $Frais->promotion_id }}" id="promotion_id" list="promo" required>
                        <datalist id="promo">                           
                              @foreach ($Promotions as $Promotion)                            
                                  <option value="{{ $Promotion->id }}">{{ $Promotion->libpromotion }}</option>
                               @endforeach
                            <option value="255">Toutes</option>
                        </datalist>
                        <input type="text" hidden value="{{ $Frais->id }}" class="form-control" name="id" id="typefrais_id">
                    </div>                         
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="mb-3">
                    <x-updatebtn />
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