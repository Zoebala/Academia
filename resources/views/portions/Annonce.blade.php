
<div class="row carousel-content animate__animated animate__fadeInUp">
    {{-- <div class="col-md-12"> --}}
      
      
        <!-- /.card-header -->
        
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  
              <?php if(null!=session("maxAnnonce")){ for ($i=1; $i < session("maxAnnonce"); $i++) { ?>     
                
                 <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                   
               <?php } } ?>
                           
                
             
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active row d-flex rounded">
                <div class="col-md-6">
                    <img class="d-block w-100 rounded" src="{{asset('images/img-6.png ')}}" style="height:450px;" alt="First slide">

                </div>
                <div class="col-md-6 text-light rounded" style="display:flex; align-items:center; background-color: rgba(121, 121, 202, 0.536);">
                    
                    <div  class="font-italic col-md-12">
                        <img src="{{ asset('images/About.png') }}" alt="documentation" style="width: 80px; margin-left:44%;" class="d-block"> 
                          <p style="text-indent: 2.5em; font-size:1.2em;">

                                L’Institut Supérieur Pédagogique (ISP) de Mbanza-Ngungu met à votre disposition un portail Web donnant possibilité aux candidats désireux de prendre inscription en son sein,
                                de pouvoir le faire en ligne à partir de leurs dispositifs
                                (smartphones, tablettes, pc, etc.) et ce, tout en étant chez soi avec possibilité de payement mobile de tous les frais administratifs associés. Bienvenue à Tous!                    
                            
                            </p>   
                    </div>
                    
                    
                </div>

                
              </div>
             
                  
                @foreach ($dataAnnonce as $Annonce)
                  <div class="carousel-item row">
                    <div class="col-md-6 rounded">

                        <img class="d-block w-100" src="{{asset('uploads/annonce/'.$Annonce->photo)}}" style="height:450px;" alt="Second slide">
                    </div>
                    <div class="row col-md-12 rounded mt-2 text-light" style="text-align:justify; display:flex; align-items:center; background-color:rgb(12, 116, 161);">
                    
                      <div class="col-md-3 justify-content-center">
                        <img src="{{asset('uploads/annonce/'.$Annonce->photo)}}" alt="documentation" style="width: 100px; height:180px;" class="rounded"> 
                               
                      </div>
                      <div class="col-md-6 font-italic">
                        <p class="text-center" style="text-indent: 2.5em; font-size:1.2em;">
    
                          <?= htmlSpecialChars_decode($Annonce->contenu); ?> <hr class="bg-white">
                          <small>Publié le {{ date('d/m/Y à H:i:s',strtotime($Annonce->created_at)) }}</small>
                       </p>
                      </div>
                      <div class="col-md-3 d-flex justify-content-end">
                         <img src="{{asset('dist/img/isp.png')}}" alt="documentation" style="width: 102px; min-height:180px; max-height:auto;" class="img-fluid"> 
                      </div>
                        
                        
                    </div>
                    
                  </div>  
                @endforeach
              
              
            </div>
            {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="sr-only">Previous</span>
            </a>  --}}
            {{-- <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
              </span>
              <span class="sr-only">Next</span>
            </a> --}}
          </div>
      
        <!-- /.card-body -->
      
      <!-- /.card -->
    {{-- </div> --}}
  </div> 
 
 
 
 
 
 
