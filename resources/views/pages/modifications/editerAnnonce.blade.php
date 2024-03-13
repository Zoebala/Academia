@extends("base")
@section("titre","Option")
@section("titre_page","Annonce | ".config('app.name'))
@section("sous_titre",config('app.name')."/Annonce")
@section("content")
<div class="col-md-12">
  <x-alertmessage />
</div>
<div class="col-md-12 d-flex justify-content-center">
  <div class="card col-md-8">
        <div class=" bg-primary pt-1">
            <p class="h5 ml-3 font-italic p-2"> <i class="fas fa-edit"></i> Modifier Annonce <i class="fas fa-question"></i></p>
        </div>
    <div class="card-body rounded">

      <form action="{{url('updateAnnonce')}}" method="post" autocomplete="off" enctype="multipart/form-data">      
        
            @csrf
            <div class="row">
                    <div class="form-group col-md-12 bg-primary rounded">

                        <div class="text-center py-1 mt-2">
                            <label for="photo" style="cursor:pointer;"><img id="imageupload" src="{{asset('uploads/annonce/'.$Annonce->photo)}}" alt="avatar" class="rounded-img @error('photo') is-invalid @enderror img-fluid img-circle" style="width:120px; height:120px;"></label><br>
                        </div>
                        <input type="file" hidden name="photo"  id="photo" class="form-control">
                        <div class="text-center py-1 text-primary">                              
                             

                        </div> 
                      
                    </div>
                  
                    <div class="form-group col-md-12">

                        <div class="py-1">
                            <label for="titre">Titre</label><br>
                            <input type="text" autofocus value="{{ $Annonce->titre }}" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" maxlength="30" placeholder="Ex: Rentrée Académique">
                        </div>                     
                        
                    </div>
                    <div class="form-group col-md-12">

                        <div class="py-1">
                            <label for="contenu">Contenu</label><br>
                            <textarea name="contenu" id="contenu" class="ckeditor form-control @error('contenu') is-invalid @enderror">
                               <?= htmlSpecialChars_decode($Annonce->contenu); ?>
                               
                            </textarea>
                        </div>      
                        <input type="hidden" value="{{ $Annonce->id }}" name="annonce_id" id="annonce_id" class="form-control">               
                       
                    </div>
             </div>
              <!-- /.col -->
        
                 <x-updatebtn />
          <!-- /.col -->
          <div class="social-auth-links text-center mb-3 mt-3">
      
            <a href="{{url('afficheAnnonce')}}" class="btn btn-block btn-info">
              <i class="fas fa-file-alt mr-2"></i> Liste Annonce
            </a>
            
        </div>
        </div>
      </form>   
     
    </div>
    <!-- /.login-card-body -->
  </div>
  
</div>
<x-visualiserupload />
@endsection

                    