@extends("base")
@section("titre_page","ModificationTranche | ".config('app.name'))
@section("sous_titre",config('app.name')."/Tranche")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <x-alertmessage />
          <div class="card card-primary">
            <div class="card-header">
              <h4 class="font-italic"><i class="fa fa-credit-card" aria-hidden="true"></i>  Modifier Tranche</h4>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post"  action="{{route('updateTranche')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="tranche">Libellé tranche</label>
                  <select name="tranche" id="tranche" class="form-control">
                    @forelse ($Tranches as $Tranche)
                        <option value="{{$Tranche->libTranche}}" @if($Tranche->libTranche==$TrancheUser->libTranche){{"selected"}}@endif>{{$Tranche->libTranche}}</option>
                    
                    @empty
                        <span> Aucune donnée trouvée</span>                        
                    @endforelse
                      
                  </select>

                </div>
                <div class="form-group">
                  <label for="montant">Montant</label>
                  <input type="number" value="{{$Tranche->montantTranche}}" name="montant" class="form-control" id="montant" placeholder="Montant">
                </div>
                <div class="form-group">
                  <label for="annee">Années académiques</label>
                  <select name="annee_id" id="annee" class="form-control">
                    @foreach ($Annees as $Annee)
                    <option value="{{$Annee->id}}" @if($Annee->id==$TrancheUser->annee_id){{"selected"}}@endif>{{$Annee->libAnnee}}</option>
                        
                    @endforeach
                      
                  </select>
                  <input type="hidden" name="tranche_id" class="form-control" value="{{$Tranche->id}}">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="">
                <x-updateBtn />
              </div>
            </form>
            <div class="social-auth-links text-center mb-3">
          
              <a href="{{url('AfficherListeTranche')}}" class="btn btn-block btn-info">
                <i class="fas fa-file-alt mr-2"></i> Liste Tranche
              </a>
              
          </div>
          </div>
        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection