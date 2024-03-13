@extends("base")
@section("titre","Promotion")
@section("titre_page"," AffichePromotion | ".config('app.name'))
@section("sous_titre",config('app.name')."/Promotion")
@section("content")

<section class="content">
    <div class="container">
              <div class="row d-flex justify-content-center">
                  <div class="col-md-10">
  
                    <div class="card carousel-content animate__animated animate__fadeInUp" style="background-color: rgba(233, 233, 240, 0.536);">
                      <x-alertmessage />
                      <div class="card-header text-light" style="background-color:rgb(12, 116, 161);">
                          <div class="row  pr-3">
                            <div class="col-lg-6 col-md-6">
                              
                              {{-- <h3 class="bg-primary py-2 pl-3 rounded">Liste des mentions</h3> --}}
                              <h4 class="pl-3 font-italic col-md-12  rounded-pill"><i class="fas fa-users"></i> Promotions</h4>
                            </div>
                            <div class="col-lg-6 col-md-6 text-lg-right text-md-right">
          
                              <a href="{{url('formParametre')}}" class="btn btn-outline-light rounded font-italic">Formulaire Promotion</a>
                            </div>
                          </div>
                      </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-stripped text-center">
                            <thead>
                              <tr class="bg-primary font-italic">                            
                                
                                
                                <th>id</th>
                                <th>Promotion</th>
                                
                                <th>Action</th>
                              </tr>
                            </thead>
                              <tbody>
                                  @foreach($Promotions as $Promotion)
                                    <tr>
                                        
                                        
                                        <td>   
                                          {{$Promotion->id}}                      
                                        </td>
                                        
                                        <td > 
                                          {{$Promotion->libpromotion}}                      
                                        </td>
                                        
                                        <td> 
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    
                                                    <a class="bg-danger dropdown-item" href="{{url('deletePromotion/'.$Promotion->id)}}">
                                                      <i class="fas fa-trash"></i>
                                                        Supprimer
                                                      </a>
                                                    <a class="bg-warning dropdown-item" href="{{url('editerPromotion/'.$Promotion->id)}}">
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
                            <tr class="font-italic text-light" style="background-color:rgb(12, 116, 161);">
                              
                              
                              
                              <th>id</th>
                              <th>Promotion</th>
                              
                              <th>Action</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      
                    </div>
                  
                </div>
            </div>
          
    </div>
       
  </section> 
@endsection