@extends("base")
@section("titre","Inscription_Admin")
@section("sous_titre",config('app.name')."/Inscription_Admin")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid row justify-content-center">
      <div class="row col-md-6">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
            <x-alertmessage />
          <div class="card card-primary">
            <div class="card-header">
                <div class="font-italic h4"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Inscription Etudiant</div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('inscription_admin_create')}}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="dateIncription">Date d'inscription</label>
                  <input type="date" name="dateIncription"class="form-control" id="dateIncription" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="Etud">Etudiant</label>
                  <input type="text" name="etudiant_id" class="form-control" list="Etudiants" id="Etud" required>
                  <datalist name="etudiant" id="Etudiants">
                    @foreach ($Etudiants as $Etudiant)
                        <option value="{{$Etudiant->id}}">{{$Etudiant->nom." ".$Etudiant->postnom." ".$Etudiant->prenom}}</option>
                        
                    @endforeach
                      
                  </datalist>
                </div>
                <div class="form-group">
                  <label for="option">Options</label>
                  <select name="idOption" id="option" class="form-control" required>
                    @foreach ($Options as $Option)
                        <option value="{{$Option->id}}">{{$Option->libOption}}</option>                        
                    @endforeach                      
                  </select>
                </div>
                <div class="form-group">
                  <label for="annee">Année Académique</label>
                  <select name="idAnnee" id="annee" class="form-control" required>
                        @foreach ($Annees as $Annee)
                            <option value="{{$Annee->id}}">{{$Annee->libAnnee}}</option>                        
                        @endforeach
                        
                  </select>
                </div>

              <div class="card-footer">
                <x-savebtn />
              </div>
            </form>
            <div class="social-auth-links text-center mb-3">
          
                <a href="{{url('afficheEtudiant')}}" class="btn btn-block btn-info">
                  <i class="fas fa-file-alt mr-2"></i> Liste des Etudiants
                </a>
                
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>    

@endsection