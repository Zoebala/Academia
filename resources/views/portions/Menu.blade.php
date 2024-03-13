@php
use App\Models\Frais;
use App\Models\Inscription;    
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="mt-3 ml-3 mb-2">

      <x-logo_isp />   
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        @auth
                
              
                @auth
                  @if (!Frais::where("etudiant_id",session("IdEtudiant"))->exists())
                      @if (!Route::is('etudiant'))
                        <div class="user-panel d-flex pb-2 mb-3 mt-2 btn btn-outline-primary d-md-none d-lg-none d-sm-none">
                          <a href="{{url('etudiant')}}" title="prenez votre inscription"><i class="fa fa-graduation-cap" aria-hidden="true"></i> S'inscrire</a>

                        </div>         
                      @endif
                  @endif
                
                @endauth
                
                <!-- Sidebar Menu -->
              @if (Auth::user()->Admin==1)                 
              
                  <nav class="mt-3" >
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                          <a href="{{url('accueil')}}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                              Navigation
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">              
                            
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-copy nav-icon"></i>
                                <p>Archivage</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{ url('/') }}" class="nav-link">
                                <i class="nav-icon fas fa-book nav-icon"></i>
                                <p>Situation</p>
                              </a>
                            </li>
                          </ul>
                        </li>                      
                        
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{url('optionpage')}}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Options Organisées</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{route('inscription_admin')}}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Inscription Admin</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{url('formCommunique')}}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Communiqués</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{url('formAnnonce')}}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Formulaire Annonce</p>
                              </a>
                            </li>
                            
                          </ul>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                              Actions
                              <i class="fas fa-angle-left right"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>
                                  Insertions
                                  <i class="fas fa-angle-left right"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{url('formParametre')}}" class="nav-link">
                                    <i class="fas fa-wrench"></i> Paramètre
                                                              
                                  </a>
                                </li>
                                
                                <li class="nav-item">
                                  <a href="{{url('formOption')}}" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Options</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('formTypeFrais')}}" class="nav-link">
                                    <i class="fas fa-credit-card nav-icon"></i>
                                    <p>Définition Frais</p>
                                  </a>
                                </li>
                                                                
                                <li class="nav-item">
                                  <a href="{{route('formTranche')}}" class="nav-link">
                                    <i class="fas fa-cut nav-icon"></i>
                                    <p>Tranche</p>
                                  </a>
                                </li>
                                
                                
                                
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>
                                  Affichages
                                  <i class="fas fa-angle-left right"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{url('afficheOption')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Liste Option</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('afficheEtudiant')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Liste Etudiant</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('affichefrais')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Liste Frais</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('afficherListePayement')}}" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Payement</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('afficheDepart')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Liste Departement</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('afficheSection')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Liste Section</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('afficheAnneeAcad')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Année Académique</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('ListInscrit')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Etudiants Inscrits</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{url('accueilEtudiantInscrit')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Paramètre Etudiant</p>
                                  </a>
                                </li>
                                
                                
                                
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>
                                  Etats
                                  <i class="fas fa-angle-left right"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{url('')}}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Dossier Complet</p>
                              </a>
                            </li>                 
                            <li class="nav-item">
                              <a href="{{route('appartEtudiant')}}" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>Appartenance Etudiant</p>
                              </a>
                            </li>                 
                            <li class="nav-item">
                              <a href="{{route('candidatTest')}}" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>Candidats Test</p>
                              </a>
                            </li>                 
                            <li class="nav-item">
                              <a href="{{url('afficherListePayement')}}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Liste Payements</p>
                              </a>
                            </li>                 
                            <li class="nav-item">
                              <a href="{{url('AfficherListeTranche')}}" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>Liste Tranches</p>
                              </a>
                            </li>                 
                                            
                            
                            
                                          
                            
                            
                          </ul>
                        </li>
                        
                      </ul>
                    </li>

                    

                   
                    <li class="nav-item">
                      <a href="{{ url('Documentation') }}" class="btn btn-outline-primary text-center d-flex justify-content-center">
                        <i class="nav-icon fas fa-file"></i>
                        <span>Documentation</span>
                      </a>
                    </li>
                  </ul>
                  </nav>
                <!-- /.sidebar-menu -->
              @endif
        @endauth

    
      {{-- pour les candidats inscrits --}}
      @if (Auth::user())
        @if (Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0 || Auth::user()->Admin==0)
                <x-slide-option-images />
                <div class="mt-3 text-center">
                  <a href="{{ url('Documentation') }}" class="btn btn-outline-primary font-italic"><i class="fas fa-file-alt"></i> Documentation</a>
                </div>
        @endif          
      @endif

      {{-- pour des visiteurs sites  --}}
      @guest
        <x-slide-option-images />
        <div class="mt-3 text-center">
          <a href="{{ url('Documentation') }}" class="btn btn-outline-primary font-italic"><i class="fas fa-file-alt"></i> Documentation</a>
        </div>
      @endguest
   </div>
    <!-- /.sidebar -->
</aside>