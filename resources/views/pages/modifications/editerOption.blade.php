@extends("base")
@section("titre_page","afficheOption | ".config('app.name'))
@section("sous_titre",config('app.name')."/option")
@section("content")
<div class="col-md-8 offset-md-2 ">
     <x-alertmessage />
  <div class="card col-md-12 ">
        <div class="bg-info pt-1">
            <h4 class="pl-3 py-2 font-italic"><i class="fas fa-edit"></i>Modification Option</h4>
        </div>
    <div class="card-body rounded">

      <form action="{{url('/updateOption')}}" method="post" autocomplete="off" enctype="multipart/form-data">      
        
            @csrf
            <div class="row ">
                    <div class="form-group col-md-12">

                        <div class="text-center py-1">
                            <label for="photo" style="cursor:pointer;"><img id="imageupload" src="{{asset('uploads/options/'.$data[0]->photo)}}" alt="avatar" class="rounded-img img-circle" style="width:100px; height:100px;"></label><br>
                        </div>
                        <input type="file" hidden name="photo"  id="photo" class="form-control">
                        <div class="text-center py-1 text-primary">                              
                              <label for="photo" style="cursor:pointer;">
                              <i class="fas fa-upload"></i>
                                uploader l'image
                               </label>

                        </div> 
                      
                    </div>
                    <div class="form-group col-md-12">

                        <div class="bg-primary rounded text-center py-1">
                            <label for="option">Option</label><br>
                        </div>
                        <input type="text" value="{{$data[0]->libOption}}" name="option" id="option" class="form-control" maxlength="50" required placeholder="Ex : Math-info">
                    
                    </div>
                    <div class="form-group col-md-12">

                        <div class="bg-primary rounded text-center py-1">
                            <label for="departement">Departement</label><br>
                        </div>                        
                        <select name="departement" id="departement" class="form-control">
                          @foreach($Depart as $dep)
                               <option value="{{$dep->id}}" @if($dep->id==$data[0]->idDep){{"selected"}}@endif>{{$dep->libDepartement}}</option>
                          @endforeach                          
                        </select>
                        <input type="hidden" value="{{$data[0]->idOption}}" id="idoption" name="idoption">
                          
                    </div>
            </div>
              <!-- /.col -->
        
                 <x-updatebtn />  
          <!-- /.col -->
        </div>
      </form>   
     
      <div class="social-auth-links text-center mb-3">
          <a href="{{url('afficheOption')}}" class="btn btn-block btn-info">
            <i class="fas fa-file-alt mr-2"></i> Afficher les Options
          </a>
         
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<x-visualiserupload />
@endsection

                    