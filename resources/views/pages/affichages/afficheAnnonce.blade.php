@extends("base")
@section("titre","Annonce")
@section("titre_page","Annonce | ".config('app.name'))
@section("sous_titre",config('app.name')."/Annonce")
@section("content")

<section class="content d-flex justify-content-center" style="width:100%;">
    <!-- Default box -->
    <div class="card card-solid col-md-10 carousel-content animate__animated animate__fadeInUp" style="background-color: rgba(165, 165, 231, 0.536);">
        <x-Alertmessage />
      <div class="card-body pb-0 ">
          <table id="example1" class="table table-stripped">
                <div class="row">

                    <thead>
                    <th class="text-light" style="background-color:rgb(12, 116, 161);"> <i class="fas fa-users"></i> Annonce - Année Académique @if(isset($Annee->libAnnee) ){{ $Annee->libAnnee }}@endif</th>
                    </thead>
                    <tbody>
                        
                        @foreach ($Annonces as $Annonce)
                        <tr>
                            
                                <td>
                                    <div class="col-md-12">
                                        <div class="card bg-light ">
                                            <div class="card-header fst-italic h4 text-muted border-bottom-0 mb-2 " style="background-color:rgb(12, 116, 161);">
                                                <h4 class="text-light"><i class="fas fa-book font-italic" ></i> {{$Annonce->titre}}</h4>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        
                                                        <p class="text-muted text-sm">
                                                            
                                                             Publiée le : {{date("d/m/Y à H:i:s",strtotime($Annonce->created_at)) }}<br>
                                                            <hr>
                                                           
                                                            <?= htmlSpecialChars_decode($Annonce->contenu) ?>
                                                           
                                                        </p>
                                                        
                                                    </div>
                                                <div class="col-5 text-center" >
                                                    <a href="{{asset("uploads/annonce/".$Annonce->photo)}}" data-toggle="lightbox" data-title="{{$Annonce->titre}}">

                                                        <img src="{{asset("uploads/annonce/".$Annonce->photo)}}" alt="user-avatar" class="img-circle img-fluid" style="width:110px; height:110px;">
                                                    </a>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-light" style="background-color:rgb(12, 116, 161);">
                                                <div class="text-right">
                                                <a href="{{url('editerAnnonce/'.$Annonce->id)}}" class="btn btn-sm bg-warning">
                                                    <i class="fas fa-edit"></i> Modifier
                                                </a>
                                                <a href="{{url('deleteAnnonce/'.$Annonce->id)}}" class="btn btn-sm bg-danger">
                                                    <i class="fas fa-trash"></i> Supprimer
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                       
                                </td>

                            </tr>
                        @endforeach

                            

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-light" style="background-color:rgb(12, 116, 161);"><i class="fas fa-users"></i> Etudiants Inscrits</th>
                        </tr>
                    </tfoot>

                </div>
        </table>
                
          
        
         
      </div>
      <!-- /.card-body -->
     
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>

@endsection