@extends("base")
@section("content")
@section("titre","Accueil")
@section("titre_page","Accueil | ".config('app.name'))
@section("sous_titre",config('app.name')."/Accueil")
<div class="col-md-12">

    <!-- Content Wrapper. Contains page content -->
      
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <x-alertmessage />
        <!-- Small boxes (Stat box) -->
        @if (Auth::user())
            
            @if (Auth::user()->Admin==1)
              <div class="row mt-3 carousel-content animate__animated animate__fadeInUp">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-info">
                        <div class="inner">
                              <div class="row">

                                <h3 class="col-lg-6 col-md-6 col-sm-12 ml-3"> <i class="fas fa-file-alt"></i> {{ $Infos["NombreAnnonce"] }}</h3>
                              
                              </div> 

                            <p class="font-italic">Annonces</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('afficheAnnonce') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-success">
                        <div class="inner">
                              <h3 class="ml-3"><i class="fas fa-credit-card"></i> {{$Infos["MontantPaye"]}} CDF</h3>

                              <p class="ml-3 font-italic">Total Frais Etudiants</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('afficherPromoPayer') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-building"></i> {{$Infos["NombreSection"]}}</h3>

                      <p class="ml-3 font-italic">Sections</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url("afficheSection") }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-users"></i> {{ $Infos['NombreInscriptions'] }}</h3>

                      <p class="ml-3 font-italic">Etudiants Inscrits</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('EtudiantInscrit') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-building"></i> {{ $Infos["NombreDepartements"]}}</h3>

                      <p class="ml-3 font-italic">Departements</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url("afficheDepart") }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-book"></i> {{ $Infos["NombreOptions"]}}</h3>

                      <p class="ml-3 font-italic">Options</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('afficheOption') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-users"></i> {{ $Infos["PourcentageInf"]  }}</h3>

                      <p class="ml-3 font-italic">Etudiants ayant obtenu moins de 60%</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('PourcentageInf') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3 class="ml-3"><i class="fas fa-users"></i> {{ $Infos["PourcentageSup"] }}</h3>

                      <p class="ml-3 font-italic">Etudiants ayant obtenu au moins 60%</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('PourcentageSup') }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
                
            @endif
        @endif
        <!-- /.row -->
        <!-- Main row -->
        @if (!Auth::user() || Auth::user()->Admin==0)
              <div class="mb-2">
                 
                    <img src="{{ asset('images/facade_isp.jpg') }}" alt="façade isp" style="height: 430px; width:100%" class="img-fluid rounded">
                
              </div>
            @include("portions.Annonce")  
            <section>
                
              <div class="mt-3">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion" class="row">
                  <div class="card card-primary col-md-6">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 font-italic" data-toggle="collapse" href="#collapseOne">
                          <i class="fas fa-graduation-cap"></i> Comment puis-je prendre mon inscription <i class="fas fa-question"></i> 
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion" >
                      <div class="card-body font-italic text-light" style="background-color:rgb(12, 116, 161);">
                          <ol>
                            <li>
                              S'indentifier dans notre plate-forme <br>
                                <small class="ml-1">
                                  Appuyer sur le bouton options au menu de navigation puis sur la commande <strong class="font-italic">s'identifier</strong>
                                </small>
                            </li>
                            <li>
                              Appuyer sur le lien s'inscrire au menu de navigation <br>
                                <small class="ml-1">Le lien <strong class="font-italic">s'inscrire</strong> apparait après s'être indentifié(e) dans l'application</small>
                            </li>
                            <li>
                              L'inscription se fait en 4 étapes
                                <ul>
                                    <li>Renseigner ses informations personnelles (1e étape)</li>
                                    <li>Choisir l'option souhaitée (2e étape)</li>
                                    <li>Fournir ses éléments de dossier (3e étape)</li>
                                    <li>Effectuer le payement mobile des frais administratifs (4e étape)</li>
                                </ul>
                            </li>
                          </ol>
                         
                      </div>
                    </div>
                  </div>
                  <div class="card card-warning col-md-6">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 text-dark font-italic" data-toggle="collapse" href="#collapseTwo">
                         <i class="fas fa-credit-card"></i> Comment puis-je modifier mes informations <i class="fas fa-question"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body text-light" style="background-color:rgb(12, 116, 161);">
                        <ol>
                          <li>
                           S'authentifier dans la plate-forme <br>
                              <small class="ml-1">
                                Se rendre sur le formulaire d'authentification en appuyant sur le bouton connexion au menu de navigation</strong>
                              </small>
                          </li>
                          <li>
                            Dans la barre de navigation au coin supérieur droit de la plate-forme, cliquer sur son image de profil
                             
                          </li>
                          <li>                           
                             Puis, cliquer sur profil
                          </li>
                          
                        </ol>
                       
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
           
        </section>
       
        @endif
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
 

</div>
@endsection