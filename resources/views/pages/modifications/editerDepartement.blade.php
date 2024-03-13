@extends("base")
@section("titre_page","editerDepartement | ".config('app.name'))
@section("sous_titre",config('app.name')."/Departement")
@section("content")
<div class="col-md-12 d-flex justify-content-center">
  <div class="card col-md-10">
    <x-alertmessage />
        <div class="bg-info pt-1">
            <h3 class="pl-3 font-italic fw-bold"><i class="fas fa-building"></i> Departement</h3>
        </div>
    <div class="card-body rounded">

        <section class="content">
            <div class="container-fluid">
              <div class="row d-flex justify-content-center">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="font-italic"><i class="fas fa-edit"></i> Modification</h4>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url("updateDepartement")}}" method="post" autocomplete="off">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="departement">Département</label>
                          <input type="text" class="form-control" value="{{$Departements[0]->Dep}}"  name="inputDepart" placeholder="Saisir un texte">
                        </div>
                        <div class="form-group">
                          <label for="section">Section</label>
                          
                          <select id="browsers"  name="selectSection" class="form-control">
                            @foreach ($Sections as $Section)
                                
                                <option value="{{$Section->id}}" @if($Section->id==$Departements[0]->section_id){{'selected'}}@endif>{{$Section->libSection}}</option>
                            @endforeach
                          </select>
                        </div>
                        <input type="hidden" name="inputId" value="{{$Departements[0]->id}}" class="form-control">
                        
                      </div>
                      <!-- /.card-body -->
      
                      <div class="mb-3 text-center">
                          <x-updatebtn />
                      </div>
                    </form>
                    <a href="{{url('afficheDepart')}}" class="btn btn-block btn-info font-italic">
                      <i class="fas fa-file-alt me-2"></i> Liste des Départements
                  </a>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (right) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section> 
     
    </div>
      
    
  </div>
</div>
	
@endsection

                    