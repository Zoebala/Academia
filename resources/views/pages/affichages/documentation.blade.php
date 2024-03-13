@extends("base")
@section("titre","Documentation")
@section("titre_page","Documentation | ".config('app.name'))
@section("sous_titre",config('app.name')."/Documentation")
@section("content")


<div class="row carousel-content animate__animated animate__fadeInUp">
    <div class="col-md-12 mt-4">
      
      
        <!-- /.card-header -->
        
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  
              <?php if(null!=session("max")){ for ($i=1; $i < 3; $i++) { ?>     
                
                 <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                   
               <?php } $k=2;} ?>
                           
                
             
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active row d-flex">
                <div class="col-md-6">
                    <img class="d-block w-100" src="{{asset('images/img-6.png ')}}" style="height:450px;" alt="First slide">

                </div>
                <div class="col-md-6 bg-primary px-3 rounded row d-flex align-content-center" style="text-align:justif;">
                  <div class="col-md-12 text-center">

                    <img src="{{ asset('images/About.png') }}" alt="documentation" style="width: 100px;">
                  </div>
                    <div class="font-italic text-center col-md-12">
                        <span>A propos!</span>
                    
                    </div>
                    
                    
                </div>

                
              </div>
              @if (null !=session("data"))
                  
                @foreach (session("data") as $item)
                  <div class="carousel-item text-center row">
                    <div class="col-md-6">

                        <img class="d-block w-100" src="{{asset('images/img-6.png ')}}" style="height:450px;" alt="Second slide">
                    </div>
                    
                  </div>  
                @endforeach
              @endif
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              {{-- <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="sr-only">Previous</span> --}}
            </a> 
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              {{-- <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
              </span>
              <span class="sr-only">Next</span> --}}
            </a>
          </div>
      
        <!-- /.card-body -->
      
      <!-- /.card -->
    </div>
  </div> 
 
 
 
 
 
 


@endsection