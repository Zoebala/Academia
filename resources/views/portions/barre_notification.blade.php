@php
use Illuminate\Support\Facades\DB;
       //gestion des notifications pour les étudiants inscrits pour Administrateur
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","inscriptions.*","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
        ->orderBy("inscriptions.etudiant_id","desc")
        ->Where("statut",1)
        ->take(3)
        ->get();

        //récupération de nombre d'inscrits
        $NbreNewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->Where("statut",1)
        ->count();            
      
@endphp

 <a class="nav-link" data-toggle="dropdown" href="#" title="Notifications">
    <i class="far fa-bell"></i>
    <span class="@if($NbreNewInscrits >0){{'badge badge-danger'}}@endif navbar-badge">
      @if (isset($NbreNewInscrits) && $NbreNewInscrits>0)
          {{$NbreNewInscrits}}
      @endif
    </span>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <div class="bg-dark text-white  p-1"> <span class="ml-5"><i class="fas fa-users"></i> Nouveaux Inscrits</span></div>
    <div class="dropdown-divider"></div>
    
            @if ($NbreNewInscrits >0)  
                @php
                    $i=1;
                @endphp        
                @foreach ($NewInscrits as $candidat)
                    
                    <a href="{{url('page_notification/'.$candidat->etudiant_id)}}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('uploads/etudiant/'.$candidat->Etud_photo)}}" alt="photo etudiant" class="mr-3 img-circle" style="width:50px; height:50px;">
                        <div class="media-body">
                        <h3 class="dropdown-item-title">
                            {{$candidat->nom." ".$candidat->postnom}}
                            <span class="float-right text-sm text-danger"><i class="fas fa-folder"></i></span>
                        </h3>
                        <p class="text-sm">{{$candidat->libOption}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{date("d/m/Y H:i:s",strtotime($candidat->dateInscription))}}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                    </a>                       
                        
                @endforeach
            @else 
                    <div class="bg-info p-2 d-flex justify-content-center"> <small class="">Aucune nouvelle notification trouvée.</small></div>
            @endif
            @if ($NbreNewInscrits>=4)
                <div class="p-1 bg-primary d-flex justify-content-center"><span>...</span></div>
                <div class="dropdown-divider"></div>
                
                
            <a href="{{url('page_notification')}}" class="dropdown-item dropdown-footer"> <i class="fas fa-eye"></i> Voir toutes les notifications</a>
            @endif
  </div>