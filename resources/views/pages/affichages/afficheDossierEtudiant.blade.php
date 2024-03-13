@extends("base")
@section("titre","DossierEtudiant")
@section("titre_page","DossierEtudiant | ".config('app.name'))
@section("sous_titre",config('app.name')."/DossierEtudiant")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header bg-primary">
              <div class="font-italic">Liste des candidats avec dossier</div>
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
                  <th>Nombre d'élements</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Misc</td>
                  <td>Dillo 0.8</td>
                  <td>Embedded devices</td>
                  <td>X</td>
                  <td>X</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Matricule</th>
                  <th>Noms</th>
                  <th>Genre</th>
                  <th>Télephone</th>
                  <th>Nombre d'élements</th>
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