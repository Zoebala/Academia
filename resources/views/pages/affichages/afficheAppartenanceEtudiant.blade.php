@extends("base")
@section("titre","AppartenanceEtudiant")
@section("titre_page","Appartenance Etudiant | ".config('app.name'))
@section("sous_titre",config('app.name')."/Etudiant")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-primary">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3 class="font-italic">Liste des candidats par : </h3>
                    </div>
                    <div class="col-lg-6 col-md-6">                        
                        <select class="form-control" name="" id="cr">
                            <option value="">Departement</option>
                            <option value="">Section</option>
                            <option value="">Option</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" style="font-size:11px;" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Matricule</th>
                  <th>Noms</th>
                  <th>Genre</th>
                  <th>Télephone</th>
                  <th>Promotion</th>
                  <th>Critère</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Misc</td>
                  <td>Dillo 0.8</td>
                  <td>Embedded devices</td>
                  <td>X</td>
                  <td>Dillo 0.8</td>
                  <td>Embedded devices</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Matricule</th>
                  <th>Noms</th>
                  <th>Genre</th>
                  <th>Télephone</th>
                  <th>Promotion</th>
                  <th>Critère</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection