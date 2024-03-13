@extends("base")
@section("titre_page","editerPromotion | ".config('app.name'))
@section("sous_titre",config('app.name')."/Promotion")
@section("content")
<div class="col-md-12 d-flex justify-content-center">
    <div class="card col-md-10">
      <x-alertmessage />
        <div class="bg-info pt-1">
            <h4 class="pl-3 font-italic fw-bold"><i class="fas fa-users"></i> Promotion</h4>
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
                    <form action="{{url("updatePromotion")}}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="promotion">Promotion</label>                           
                          <input type="text" class="form-control" name="promotion" id="promotion" value="{{$Promo->libpromotion}}" maxlength="8" required>
                          <input type="hidden" value="{{$Promo->id}}" class="form-control" name="id" required>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="mb-3">
                        <x-updatebtn />
                      </div>
                    </form>
                    <div class="social-auth-links text-center mb-3"> 
                      <a href="{{url('affichePromotion')}}" class="btn btn-block btn-info font-italic">
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

                    