@extends("base")
@section("content")
@section("sous_titre",config('app.name')."/Etudiant")
<div class="col-md-12 carousel-content animate__animated animate__fadeInUp" style="width:100%;background:linear-gradient(rgb(12, 116, 161),white,rgba(8, 8, 127, 0.776),rgb(12, 116, 161)); height:700px;">
    <section class="content" style="height:95%;">
      <div class="container-fluid">
        <x-alertmessage />
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <div class="row">

                  <h3 class="col-lg-6 col-md-6"><i class="fas fa-user ml-3"></i></h3>
                  {{-- <h2 class="col-lg-6 col-md-6"></h2> --}}
                </div> 

                <p>Modifer mes informations personnelles</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('editerEtudiant/'.$Etudiant_id)}}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><i class="fas fa-edit"></i></h3>

                <p>Mettre à Jour Mon dossier</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('editerDossierEtudiant/'.$Etudiant_id.'/'.$idOption->option_id)}}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><i class="fas fa-file"></i></h3>

                <p>Actualités de l'Institut</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><i class="fas fa-credit-card"></i></h3>

                <p>Payement Frais</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('formPayement/'.session("IdEtudiant")) }}" class="small-box-footer">Afficher les informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
        
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

</div>

@endsection