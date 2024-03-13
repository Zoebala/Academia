@extends("base")

@section("titre_page","afficheEtudiantInscript | ".config('app.name'))
@section("sous_titre",config('app.name')."/Etudiant")
@section("content")

   <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
              <x-alertmessage />
                <div class="row bg-secondary pr-3">
                  <div class="col-lg-6 col-md-6">

                    <h4 class="col-md-12 p-2 font-italic"><i class="fas fa-users"></i> Etudiants Inscrits</h4>
                  </div>
              
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" style="font-size:11px;" class="table table-bordered">
                  <thead>
                  <tr>
                    
                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Noms</th>
                    <th>Genre</th>
                    <th>Age</th>
                    <th>Télephone</th>
                    <th>Nationnalité</th>
                    <th>Pourc obt</th>
                    <th>Option</th>
                    <th>Père</th>
                    <th>Mère</th>
                  
                    <th>Télephone tutaire</th>
                    <th>Adresse tutaire</th>
                    <th>Frais Adm</th>
                    <th>Date Inscription</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                @foreach($Etudiants as $Etudiant)
                  <tr>
                   
                    <td> <img src="{{'uploads/etudiant/'.$Etudiant->photo}}" style="width:100px;" class="img-fluid rounded-circle" /> </td>
                    <td>{{$Etudiant->matricule}}</td>
                    <td>{{$Etudiant->nom.' '.$Etudiant->postnom.' '.$Etudiant->prenom}}</td>
                    <td>{{$Etudiant->sexe}}</td>
                    <td>{{date('Y')-date('Y',strtotime($Etudiant->datenais))}}</td>
                    <td>{{$Etudiant->teletudiant}}</td>
                    <td>{{$Etudiant->nationalite}}</td>
                    <td>{{$Etudiant->pourcentage}}</td>                
                    <td>{{$Etudiant->libOption}}</td>                
                    <td>{{$Etudiant->nompere}}</td>             
                    <td>{{$Etudiant->nommere}}</td>             
                    <td>{{$Etudiant->teltutaire}}</td>
                    <td>{{$Etudiant->adresse}}</td>
                    <td>{{$Etudiant->montantPayer." FC"}}</td>
                    <td>{{date("d/m/Y H:i:s",strtotime($Etudiant->dateInscription))}}</td>
                    
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Noms</th>
                    <th>Genre</th>
                    <th>Age</th>
                    <th>Télephone</th>
                    <th>Nationnalité</th>
                    <th>Pourc obt</th>
                    <th>Option</th>
                    <th>Père</th>
                    <th>Mère</th>
                    
                    <th>Télephone tutaire</th>
                    <th>Adresse tutaire</th>
                    <th>Frais Adm</th>
                    <th>Date Inscription</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 
  
@endsection