@extends("base")
@section("titre","Année Académique")
@section("titre_page","AfficheAnnée Académique | ".config('app.name'))
@section("sous_titre",config('app.name')."/Année Académique")
@section("content")

<section class="content">
    <div class="container">
              <div class="row d-flex justify-content-center">
                  <div class="col-md-10">
  
                    <div class="card carousel-content animate__animated animate__fadeInUp">
                      <x-alertmessage />
                      <div class="card-header bg-primary">
                          <div class="row  pr-3">
                            <div class="col-lg-6 col-md-6">
                              
                              {{-- <h3 class="bg-primary py-2 pl-3 rounded">Liste des mentions</h3> --}}
                              <h4 class="pl-3 font-italic col-md-12  rounded-pill"><i class="fas fa-book"></i> Année Académique</h4>
                            </div>
                            <div class="col-lg-6 col-md-6 text-lg-right text-md-right">
          
                              <a href="{{url('formParametre')}}" class="btn btn-outline-light rounded font-italic">Formulaire Année Acad.</a>
                            </div>
                          </div>
                      </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-stripped text-center">
                            <thead>
                              <tr class="bg-primary font-italic">                            
                                
                                
                                <th>id</th>
                                <th>Années</th>
                                
                                <th>Action</th>
                              </tr>
                            </thead>
                              <tbody>
                                  @foreach($Annees as $Annee)
                                    <tr>
                                        
                                        
                                        <td>   
                                          {{$Annee->id}}                      
                                        </td>
                                        
                                        <td > 
                                          {{$Annee->libAnnee}}                      
                                        </td>
                                        
                                        <td> 
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    
                                                    <a class="bg-danger dropdown-item" href="{{url('deleteAnnee/'.$Annee->id)}}">
                                                      <i class="fas fa-trash"></i>
                                                        Supprimer
                                                      </a>
                                                    <a class="bg-warning dropdown-item" href="{{url('editerAnnee/'.$Annee->id)}}">
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
                            <tr class="bg-primary font-italic">
                              
                              
                              
                              <th>id</th>
                              <th>Années</th>
                              
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