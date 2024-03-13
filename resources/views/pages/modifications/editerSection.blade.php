@extends("base")
@section("titre_page","editerSection | ".config('app.name'))
@section("sous_titre",config('app.name')."/Section")
@section("content")
<div class="col-md-12 d-flex justify-content-center">
  <div class="card col-md-10">
    <x-alertmessage />
        <div class="bg-info pt-1">
            <h3 class="pl-3 font-italic fw-bold"><i class="fas fa-building"></i> Section</h3>
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
                    <form action="{{url("updateSection")}}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="Section">Section</label>
                          <input type="text" value="{{$Section->libSection}}" class="form-control" name="inputSection" id="Section" required placeholder="Ex: Techniques">
                          <input type="hidden" value="{{$Section->id}}" class="form-control" name="section_id" required>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="mb-3">
                        <x-updatebtn />
                      </div>
                    </form>
                    <div class="social-auth-links text-center mb-3"> 
                      <a href="{{url('afficheSection')}}" class="btn btn-block btn-info font-italic">
                          <i class="fas fa-file-alt me-2"></i> Liste des Sections
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

                    