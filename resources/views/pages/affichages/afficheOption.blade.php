@extends("base")
@section("titre","Option")
@section("titre_page","afficheOption | ".config('app.name'))
@section("sous_titre",config('app.name')."/option")
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
                            <h3 class="pl-3 font-italic col-md-12  rounded-pill"><i class="fas fa-book"></i> Options</h3>
                          </div>
                          <div class="col-lg-6 col-md-6 text-lg-right text-md-right">
        
                            <a href="{{url('formOption')}}" class="btn btn-outline-light rounded font-italic">Formulaire Option</a>
                          </div>
                        </div>
                    </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-stripped text-center">
                          <thead>
                            <tr class="font-italic text-light" style="background-color:rgb(12, 116, 161);">                            
                              
                              
                              <th>Option</th>
                              <th>Département</th>
                              <th>Section</th>
                              <th>image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                            <tbody>
                                @foreach($Options as $Option)
                                  <tr>
                                      
                                      
                                      
                                      <td > 
                                        {{$Option->libOption}}                      
                                      </td>
                                      <td>   
                                        {{$Option->libDepartement}}                      
                                      </td>
                                      <td>   
                                        {{$Option->libSection}}                      
                                      </td>
                                      <td > 
                                        <a href="{{asset('uploads/options/'.$Option->photo)}}" data-toggle="lightbox" data-title="{{"Option - ".$Option->libOption}}">
                                          <img src="{{asset('uploads/options/'.$Option->photo)}}" style="width:50px; height:50px;"/>                      

                                        </a>
                                      </td>
                                      <td> 
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-info">Action</button>
                                              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                              <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                  
                                                  <a class="bg-danger dropdown-item" href="{{url('delete/'.$Option->idOption)}}">
                                                    <i class="fas fa-trash"></i>
                                                      Supprimer
                                                    </a>
                                                  <a class="bg-warning dropdown-item" href="{{url('editOption/'.$Option->idOption)}}">
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
                            
                            
                            
                            <th>Option</th>
                            <th>Département</th>
                            <th>Section</th>
                            <th>image</th>
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