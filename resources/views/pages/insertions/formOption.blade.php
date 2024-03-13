@extends("base")
@section("titre","Option")
@section("titre_page","afficheOption | ".config('app.name'))
@section("sous_titre",config('app.name')."/option")
@section("content")
<div class="col-md-12">
  <x-alertmessage />
</div>
<div class="col-md-12 d-flex justify-content-center">
  <div class="card col-md-6">
        <div class=" bg-primary pt-1">
            <p class="h5 ml-3 font-italic p-2"> <i class="fas fa-plus-square"></i> Ajouter une Option</p>
        </div>
    <div class="card-body rounded">

      <form action="{{url('insertOption')}}" method="post" autocomplete="off" enctype="multipart/form-data">      
        
            @csrf
            <div class="row">
                    <div class="form-group col-md-12 bg-primary rounded">

                        <div class="text-center py-1 mt-1">
                            <label for="photo" style="cursor:pointer;"><img id="imageupload" src="{{asset('dist/img/camera.png')}}" alt="avatar" class="rounded-img @error('photo') is-invalid @enderror img-fluid" style="width:128px; height:128px;" ></label><br>
                        </div>
                        <input type="file" hidden name="photo"  id="photo" class="form-control">
                        <div class="text-center py-1 text-primary">                              
                              <label for="photo" style="cursor:pointer;" class="btn btn-outline-light">
                              <i class="fas fa-upload"></i>
                                uploader l'image
                               </label>

                        </div> 
                      
                    </div>
                    <div class="form-group col-md-12">

                        <div class="py-1">
                            <label for="option">Option</label><br>
                        </div>
                        <input type="text" value="{{old('option')}}" name="option" id="option" class="form-control @error('option') is-invalid @enderror" maxlength="30" required placeholder="Ex : Math-info">
                    
                    </div>
                    <div class="form-group col-md-12">

                        <div class="py-1">
                            <label for="departement">Departement</label><br>
                        </div>                        
                        <select name="departement" id="departement" class="form-control ayeme">
                          @foreach($Depart as $dep)
                               <option value="{{$dep->id}}">{{$dep->libDepartement}}</option>
                          @endforeach                          
                        </select>
                          
                    </div>
             </div>
              <!-- /.col -->
        
                 <x-savebtn />
          <!-- /.col -->
          <div class="social-auth-links text-center mb-3 mt-3">
      
            <a href="{{url('afficheOption')}}" class="btn btn-block btn-info">
              <i class="fas fa-file-alt mr-2"></i> Afficher les Options
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

                    