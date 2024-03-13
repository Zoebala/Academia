@php
use App\Models\Frais;
use App\Models\Inscription;    
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('accueil')}}" class="nav-link"> <i class="fas fa-home"></i> Accueil</a>
        </li>
          
    
      @auth
        @if (!Frais::where("etudiant_id",session("IdEtudiant"))->exists())
            @if (!Route::is('etudiant'))
                
              <li class="nav-item d-none d-sm-inline-block">        
                {{-- <a href="{{url('etudiant')}}" class="nav-link" title="prenez votre inscription"><i class="fa fa-graduation-cap" aria-hidden="true"></i> S'inscrire</a> --}}
                <a href="{{ url('etudiant') }}" class="btn btn-outline-primary rounded-pill">
                  <i class="fas fa-graduation-cap"></i> s'inscrire
               </a>
              </li>
            @endif
            
        @endif
          
      @endauth
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      @if (Auth::user())
          
        @if (Auth::user()->Admin==1)
          <li class="nav-item dropdown" id="notification">
            <x-Barre_notification />
            {{-- @include('portions.barre_notification') --}}
            
          </li>
            
        @endif
      @endif
      <!-- Notifications Dropdown Menu -->
      @if (Route::has('login'))
      @if(!Auth::user())
         @if (!Route::is('login'))             
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-lock"></i> {{ __('Connexion') }}</a>
              </li>
         @endif
        @endif
      @endif
      
      @if (!Auth::user())              
          @if(!Route::is("register"))
              @if (Route::has('register'))

                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-list" title="options" ></i> Options         
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">                           
                      <a class="dropdown-item bg-primary" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('S\'identifier') }}</a>
                                    
                  </div>
                </li>
                        
              @endif
          @endif
       @endif

       @auth
               
             @if(Auth::user()) 
                {{-- @if (Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0)            --}}
                      <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                            <img src="@if(null !=session("photo") && Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0){{asset('uploads/etudiant/'.session('photo'))}}@else{{asset('dist/img/avatar.png')}}@endif" style="width: 45px;" class="avatar img-fluid rounded" alt="Charles Hall" /> <span class="text-dark">  @if(null !=session("Etudiant")){{session("Etudiant")}}@else{{ Auth::user()->name }}@endif</span>
                          </a>
                        
                          <a class="nav-link dropdown-toggle d-none d-sm-inline-block" @if(!Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0) style="position: relative; bottom:10px;" @else style="position: relative; bottom:8px;" @endif href="#" data-toggle="dropdown">
                            <img src="@if(null !=session("photo") && Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0){{asset('uploads/etudiant/'.session('photo'))}}@else{{asset('dist/img/avatar.png')}}@endif" style="width: 45px; height:40px;" class="avatar img-fluid rounded" alt="Charles Hall" /> <span class="text-dark">  @if(null !=session("Etudiant")){{session("Etudiant")}}@else{{ Auth::user()->name }}@endif</span>
                          </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href='@if(null !=session("IdEtudiant")){{url("accueilEtudiantInscrit/".session("IdEtudiant"))}}@else{{"#"}}@endif'><i class="align-middle mr-1 fas fa-user"></i> Profil</a>
                          <div class="dropdown-divider"></div>
                          @if (Auth::user()->Admin==1)
                              
                            <a class="dropdown-item" href="{{ url("/") }}"><i class="align-middle mr-1 fas fa-circle"></i> Analyse</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url("formParametre") }}"><i class="align-middle mr-1 fas fa-wrench"></i> Paramétrage</a>
                            <div class="dropdown-divider"></div>
                         @endif
                          
                              
                            
                            <a class="dropdown-item" href="{{ url("/") }}"><i class="align-middle mr-1 fas fa-credit-card"></i> Mes Payements</a>
                            <div class="dropdown-divider"></div>
                         

                      
                          @if (Auth::user())
                        
                            <a class="dropdown-item bg-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-power-off"></i> {{ __(' Deconnexion') }}
                              
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                              </form>
                          @endif
                        </div>
                      </li>
                    {{-- @endif                 --}}
                @endif
        @endauth
    </ul>
    
  </nav>
 {{-- <script>
    setInterval(() => {
      document.getElementById('notification').load('coucou');
      
    }, 1000);
 </script> --}}