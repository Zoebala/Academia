@extends("base")
@section("titre","Notification")
@section("titre_page","Notification | ".config('app.name'))
@section("sous_titre",config('app.name')."/Notifications")
@section("content")

<section class="content d-flex justify-content-center" style="width:100%;">

    <!-- Default box -->
    <div class="card card-solid col-md-10">
      <div class="card-body pb-0 ">
          <table id="example1" class="table table-stripped">
                <div class="row">

                    <thead>
                        <th class="bg-primary"> <i class="fas fa-users"></i> Etudiants Inscrits | <i class="fas fa-bell"></i> Notifications</th>
                    </thead>
                    <tbody>
                        
                        @foreach ($NewInscrits as $NewInscrit)
                        <tr>
                            
                                <td>
                                    <div class="col-md-12">
                                        <div class="card bg-light ">
                                            <div class="card-header text-muted border-bottom-0 bg-primary mb-2">
                                               <i class="fas fa-book"></i> {{$NewInscrit->libOption}}
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b> {{$NewInscrit->nom.' '.$NewInscrit->postnom.' '.$NewInscrit->prenom}}</b></h2>
                                                        <p class="text-muted text-sm">
                                                            <b>Détails  </b> <br>Nationalité :  {{$NewInscrit->nationalite}} <br> Pourcentage : {{$NewInscrit->pourcentage.' %'}}
                                                            <br> Date Naissance : {{date("d/m/Y",strtotime($NewInscrit->datenais)) }} <br>
                                                            Date Inscription : {{date("d/m/Y h:i:s",strtotime($NewInscrit->dateInscription)) }}<br>
                                                            Père: {{$NewInscrit->nompere}} <br>
                                                            Tel Tutaire: {{$NewInscrit->teltutaire}}
                                                        </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Adresse: {{$NewInscrit->adresse}}</li>
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone :{{' '.$NewInscrit->teletudiant}}</li>
                                                        </ul>
                                                    </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{asset("uploads/etudiant/".$NewInscrit->Etud_photo)}}" alt="user-avatar" class="img-circle img-fluid" style="width:100px; height:100px;">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                <a href="{{url('editerEtudiant/'.$NewInscrit->etudiant_id)}}" class="btn btn-sm btn-outline-warning text-dark">
                                                    <i class="fas fa-user"></i> Informations Personnelles 
                                                </a>
                                                <a href="{{url('editerDossierEtudiant/'.$NewInscrit->etudiant_id.'/'.$NewInscrit->id)}}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-folder"></i> Elements dossier
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                       
                                </td>

                            </tr>
                        @endforeach

                            

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="bg-primary"><i class="fas fa-users"></i> Etudiants Inscrits</th>
                        </tr>
                    </tfoot>

                </div>
        </table>
                
          
        
         
      </div>
      <!-- /.card-body -->
     
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>

@endsection