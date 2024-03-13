@extends("base")
@section("titre_page","editerAnnéeAcadémique | ".config('app.name'))
@section("sous_titre",config('app.name')."/Année Académique")
@section("content")
<div class="col-md-12 d-flex justify-content-center">
    <div class="card col-md-10">
      <x-alertmessage />
        <div class="bg-info pt-1">
            <h4 class="pl-3 font-italic fw-bold"><i class="fas fa-book"></i> Année Académique</h4>
        </div>
    <div class="card-body login-card-body rounded">

        <section class="content">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="font-italic"><i class="fas fa-edit"></i> Modification</h4>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url("updateAnnee")}}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="annee">Annee Académique</label>                           
                          <input type="text" class="form-control" name="Annee" id="annee" value="{{$Annee->libAnnee}}" maxlength="10" required>
                          <input type="hidden" value="{{$Annee->id}}" class="form-control" name="id" required>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="mb-3">
                        <x-updatebtn />
                      </div>
                    </form>
                    <div class="social-auth-links text-center mb-3"> 
                      <a href="{{url('afficheSection')}}" class="btn btn-block btn-info font-italic">
                          <i class="fas fa-file-alt me-2"></i> Liste des Promotions
                      </a>
                      
                  </div>
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

                    