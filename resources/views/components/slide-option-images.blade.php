@php
use App\Models\Inscription;    
@endphp
<div class="row">
    <div class="col-md-12  @if (Inscription::where("etudiant_id",session("IdEtudiant"))->count()>0 ){{'mt-1'}}@else{{'mt-4'}}@endif">
      
      
        <!-- /.card-header -->
        
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  
              <?php if(null!=session("max")){ for ($i=1; $i < session("max"); $i++) { ?>     
                
                 <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                   
               <?php } $k=2;} ?>
                           
                
             
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('dist/img/isp.png')}}" style="height:450px;" alt="First slide">
                <span class="text-light mt-2 ml-5">Options organisées</span>
              </div>
              @if (null !=session("data"))
                  
                @foreach (session("data") as $item)
                  <div class="carousel-item text-center">
                    <img class="d-block w-100" src="{{asset('uploads/options/'.$item->photo)}}" style="height:450px;" alt="Second slide">
                    <span class="text-light mt-2">{{$item->libOption}}</span>   
                  </div>  
                @endforeach
              @endif
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="sr-only">Previous</span>
            </a> 
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </div>
      
        <!-- /.card-body -->
      
      <!-- /.card -->
    </div>
  </div>