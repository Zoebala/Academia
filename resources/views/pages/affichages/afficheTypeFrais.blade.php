@extends("base")
@section("titre","Liste Frais")
@section("titre_page","afficheFrais | ".config('app.name'))
@section("sous_titre",config('app.name')."/Frais")
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
                            <h3 class="pl-3 font-italic col-md-12  rounded-pill"><i class="fas fa-credit-card"></i> Frais à Payer</h3>
                          </div>
                          <div class="col-lg-6 col-md-6 text-lg-right text-md-right">
        
                            <a href="{{url('formTypeFrais')}}" class="btn btn-outline-light rounded font-italic">Formulaire Frais</a>
                          </div>
                        </div>
                    </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-stripped text-center">
                          <thead>
                            <tr class="bg-primary font-italic">                            
                              
                              <th>Motif</th>
                              <th>Montant</th>
                              <th>Promotion</th>
                              <th>Annee Académique</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                            <tbody>
                                @foreach($Frais as $F)
                                  <tr>                                 
                                      
                                      <td>   
                                        {{$F->Motif}}                      
                                      </td>
                                      <td>   
                                        {{$F->Montanttypefrais." FC"}}                      
                                      </td>
                                      <td>   
                                       @if($F->promo_id==255){{ "Toutes" }} @else{{$F->libpromotion}}@endif                      
                                      </td>
                                      <td>   
                                        {{$F->libAnnee}}                      
                                      </td>
                                     
                                      <td> 
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-info">Action</button>
                                              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                              <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                              <div class="dropdown-menu" role="menu">
                                                  
                                                  <a class="bg-danger dropdown-item" href="{{url('deleteFrais/'.$F->id)}}">
                                                    <i class="fas fa-trash"></i>
                                                      Supprimer
                                                    </a>
                                                  <a class="bg-warning dropdown-item" href="{{url('editerFrais/'.$F->id)}}">
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
                            
                              <th>Motif</th>
                              <th>Montant</th>
                              <th>Promotion</th>
                              <th>Annee Académique</th>
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