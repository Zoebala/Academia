@extends("base")
@section("titre_page","Tranche | ".config('app.name'))
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
              <h4 class="font-italic"><i class="fa fa-credit-card" aria-hidden="true"></i>  Tranche à Payer</h4>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post"  action="{{route('createTranche')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="tranche">Libellé tranche</label>
                  <select name="tranche" id="tranche" class="form-control">
                    <option value="Frais Administratifs" selected>Frais Administratifs</option>
                     
                      <option value="Première Tranche">Première Tranche</option>
                      <option value="Deuxième Tranche">Deuxième Tranche</option>
                      <option value="Troisième Tranche">Troisième Tranche</option>
                      <option value="Quatrième Tranche">Quatrième Tranche</option>
                  </select>

                </div>
                <div class="form-group">
                  <label for="montant">Montant</label>
                  <input type="number" value="{{old('montant')}}" name="montant" class="form-control" id="montant" placeholder="Montant">
                </div>
                <div class="form-group">
                  <label for="annee_id">Année Académique</label>
                  <select name="annee_id" id="annee" class="form-control">
                    @foreach ($Annees as $Annee)
                    <option value="{{$Annee->id}}">{{$Annee->libAnnee}}</option>
                        
                    @endforeach
                      
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="">
                <x-savebtn />
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