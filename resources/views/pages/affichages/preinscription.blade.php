@extends("base")
@section("titre","Payement")
@section("titre_page","Payement | ".config('app.name'))
@section("sous_titre",config('app.name')."/Payement")
@section("content")
       
          <!-- left column -->
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header row">
                        <div class="col-lg-6 col-md-6">
                            <h3>Payement Frais Administratif</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 text-lg-right text-secondadry">
                            <span class="font-weight-bold font-italic">Etape 4/4</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                   <x-alertmessage />
                    <!-- form start -->
                    <form action="insertEtudiant" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="card-body  text-dark">
                       <div class="form-group text-center">
                            <label for="photo"><img src="{{asset('images/paypal.png')}}" id="imageupload" class="img-fluid rounded-circle" alt="photo etudiant" style="width:150px; height:150px;"></label>
                            <div class="input-group">
                                                        
                            </div>
                        </div>
                        <fieldset class="border border-black-4 mb-3">
                                <legend class="font-italic text-underline">Détails Payement Frais</legend>
                                <div class="col-12">

                                    <div class="form-group">
                                        <label for="nom">code</label>
                                        <input type="text" class="form-control" value="{{old('nom')}}" name="nom" id="nom" placeholder="saisir un nom">
                                    </div>
                                    
                                    
                                </div>
                        </fieldset>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-secondary"><img src="{{asset('images/paypal.png')}}" id="imageupload" class="img-fluid rounded-circle" alt="photo etudiant" style="cursor:pointer;width:30px;"> Payement</button>

                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="social-auth-links text-center mb-3"> 
                        <a href="{{url('affichepayement')}}" class="btn btn-block btn-info">
                            <i class="fas fa-file-alt me-2"></i> Liste des payements
                        </a>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook me-2"></i> Rejoignez nous sur Facebook
                        </a>
                    </div>
                </div>
            </div>

     
@endsection