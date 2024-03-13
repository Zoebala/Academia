@extends('base')
@section("titre","Paramétrage")
@section("titre_page","Paramétrage | ".config('app.name'))
@section("sous_titre",config('app.name')."/Paramétrage")

@section('content')
<section class="content" style="width:100%;">
    <div class="container-fluid">
        <x-alertmessage />
        
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Sections</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Départements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Années académiques</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-promotion-tab" data-toggle="pill" href="#custom-tabs-four-promotion" role="tab" aria-controls="custom-tabs-four-promotion" aria-selected="false">Promotions</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <!-- form pour la section-->
                  <section class="content ">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-plus"></i> Ajouter une Section</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("InsertionSection")}}" method="post">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="Section">Section</label>
                                    <input type="text" value="{{old('inputSection')}}" class="form-control @error('inputSection') is-invalid @enderror" name="inputSection" id="Section"  placeholder="Ex : Techniques" maxlength="25">
                                  </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="">
                                  <x-savebtn />
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
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <!-- form pour le departement-->
                  <section class="content">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"> <i class="fa fa-plus"></i> Ajouter un Département</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("InsertDepart")}}" method="post" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="departement">Département</label>
                                    <input type="text" class="form-control @error('inputDepart') is-invalid @enderror" value="{{old('inputDepart')}}" id="exampleInputEmail1" name="inputDepart" placeholder="Ex : Français" maxlength="75">
                                  </div>
                                  <div class="form-group">
                                    <label for="section">Section</label>
                                    <input list="browsers" id="section" name="selectSection" class="form-control">
                                    <datalist id="browsers" id="exampleInputPassword1">
                                     @foreach ($Sections as $Section)
                                         
                                     <option value="{{$Section->id}}">{{$Section->libSection}}</option>
                                     @endforeach
                                    </datalist>
                                  </div>
                                  
                                </div>
                                <!-- /.card-body -->
                
                                <div class="text-center mb-3">
                                    <button  type="submit" class="btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-plus"></i> Enregistrer
                                     </button>
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
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <section class="content">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-plus"></i> Ajouter une Année académique</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("insertAnnee")}}" method="post" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="anneecad">Année Académique</label>
                                    <select class="form-control @error('selectAnnee') is-invalid @enderror" id="anneecad" name="selectAnnee">
                                      <option value="2020-2021">2020-2021</option>
                                      <option value="2021-2022">2021-2022</option>
                                      <option value="2022-2023">2022-2023</option>
                                      <option value="2023-2024">2023-2024</option>
                                      <option value="2024-2025">2024-2025</option>
                                      <option value="2025-2026">2025-2026</option>
                                      <option value="2026-2027">2026-2027</option>
                                      <option value="2027-2028">2027-2028</option>
                                      <option value="2028-2029">2028-2029</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="">
                                  <div class="text-center mb-3">
                                    <button  type="submit" class="btn btn-outline-primary rounded-pill">
                                        <i class="fas fa-plus"></i> Sauvegarder
                                     </button>
                                </div>
                                </div>
                              </form>
                              <a href="{{url('afficheAnneeAcad')}}" class="btn btn-block btn-info font-italic">
                                <i class="fas fa-file-alt me-2"></i> Liste Année Académique
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
                <div class="tab-pane fade" id="custom-tabs-four-promotion" role="tabpanel" aria-labelledby="custom-tabs-four-promotion-tab">
                  <section class="content">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <!-- left column -->
                          <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-plus"></i> Ajouter une Promotion</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{url("insertPromotion")}}" method="post" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="promotion">Promotion</label>
                                    <select class="form-control @error('promotion') is-invalid @enderror" id="promotion" name="promotion">
                                      <option value="L1-PADEM">L1-PADEM</option>
                                      <option value="L2-PADEM">L2-PADEM</option>
                                      <option value="L1-LMD">L1-LMD</option>
                                      <option value="L2-LMD">L2-LMD</option>
                                      <option value="L3-LMD">L3-LMD</option>
                                      <option value="L4-LMD">L4-LMD</option>                                      
                                    </select>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="">
                                  <div class="text-center mb-3">
                                    <button  type="submit" class="btn btn-outline-primary rounded-pill">
                                        <i class="fas fa-plus"></i> Sauvegarder
                                     </button>
                                </div>
                                </div>
                              </form>
                              <a href="{{url('affichePromotion')}}" class="btn btn-block btn-info font-italic">
                                <i class="fas fa-file-alt me-2"></i> Liste Promotions
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
            <!-- /.card -->
          </div>
        </div>
      </div>
      
      <!-- /.card -->
   
    <!-- /.container-fluid -->
  </section>
        
@endsection