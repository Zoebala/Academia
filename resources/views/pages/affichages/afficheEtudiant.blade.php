@extends("base")

@section("titre_page","afficheEtudiant | ".config('app.name'))
@section("sous_titre",config('app.name')."/Etudiant")
@section("content")

   <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="card carousel-content animate__animated animate__fadeInUp">
              <div class="card-header">
              <x-alertmessage />
                <div class="row bg-secondary pr-3">
                  <div class="col-lg-6 col-md-6">

                    <h3 class="card-title col-md-12 p-3">Liste des candidats</h3>
                  </div>
                  <div class="col-lg-6 col-md-6 text-right pt-2">

                    <a href="{{url('etudiant')}}" class="btn btn-outline-warning rounded">Formulaire Candidat</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered">
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
                    <th>Père</th>
                    <th>Mère</th>
                    <th>Télephone tutaire</th>
                    <th>Adresse tutaire</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($Etudiants as $Etudiant)
                  <tr>
                   
                    <td> <img src="{{'uploads/etudiant/'.$Etudiant->photo}}" style="width:80px; height:55px;" class="img-fluid rounded-circle" /> </td>
                    <td>{{$Etudiant->matricule}}</td>
                    <td>{{$Etudiant->nom.' '.$Etudiant->postnom.' '.$Etudiant->prenom}}</td>
                    <td style="width:5px;">{{$Etudiant->sexe}}</td>
                    <td>{{date('Y')-date('Y',strtotime($Etudiant->datenais))}}</td>
                    <td>{{$Etudiant->teletudiant}}</td>
                    <td>{{$Etudiant->nationalite}}</td>
                    <td>{{$Etudiant->pourcentage}}</td>
                    <td>{{$Etudiant->nompere}}</td>
                    <td>{{$Etudiant->nommere}}</td>
                    <td>{{$Etudiant->teltutaire}}</td>
                    <td>{{$Etudiant->adresse}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="bg-danger dropdown-item" href="{{'deleteEtudiant/'.$Etudiant->id}}">
                            <i class="fas fa-trash"></i>
                                              
                            Supprimer
                          </a>
                          <a class="bg-warning dropdown-item" href="{{'editerEtudiant/'.$Etudiant->id}}">
                            <i class="fas fa-edit"></i>
                            Editer
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Noms</th>
                    <th style="width:5px;">Genre</th>
                    <th>Age</th>
                    <th>Télephone</th>
                    <th>Nationnalité</th>
                    <th>Pourc obt</th>
                    <th>Père</th>
                    <th>Mère</th>
                    <th>Télephone tutaire</th>
                    <th>Adresse tutaire</th>
                    <th>Actions</th>
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