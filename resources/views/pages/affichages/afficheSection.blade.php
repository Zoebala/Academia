@extends("base")
@section("titre","Section")
@section("titre_page","afficheSection | ".config('app.name'))
@section("sous_titre",config('app.name')."/Section")
@section("content")

<section class="content">
  <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">

                  <div class="card arousel-content animate__animated animate__fadeInUp" style="background-color: rgba(233, 233, 240, 0.536);">
                    <x-alertmessage />
                    <div class="card-header text-light" style="background-color:rgb(12, 116, 161);">
                        <div class="row  pr-3">
                          <div class="col-lg-6 col-md-6">
                            
                            {{-- <h3 class="bg-primary py-2 pl-3 rounded">Liste des mentions</h3> --}}
                            <h4 class="col-md-12 pl-3 rounded-pill font-italic"><i class="fas fa-building"></i> Sections</h4>
                          </div> 
                          <div class="col-lg-6 col-md-6 text-right ">
        
                            <a href="{{url('formParametre')}}" class="btn btn-outline-light rounded font-italic">Formulaire Section</a>
                          </div>
                        </div>
                    </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-stripped text-center">
                          <thead>
                          <tr class=" font-italic text-light" style="background-color:rgb(12, 116, 161);">                           
                            
                            
                         
                            <th>id</th>
                            
                            <th>Section</th>
                            
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($Sections as $Section)
                            <tr>
                                <td>   
                                  {{$Section->id}}                      
                                </td>
                                
                                <td>   
                                  {{$Section->libSection}}                      
                                </td>
                                
                                <td> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            
                                            <a class="bg-danger dropdown-item" href="{{url('deleteSection/'.$Section->id)}}">
                                               <i class="fas fa-trash"></i>
                                                Supprimer
                                              </a>
                                            <a class="bg-warning dropdown-item" href="{{url('editSection/'.$Section->id)}}">
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
                            
                            <th>Section</th>
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