@extends("base")
@section("titre","Test")
@section("titre_page","etudiantTest | ".config('app.name'))
@section("sous_titre",config('app.name')."/Test")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header bg-primary">
              <div class="font-italic font-weight-bold">Liste des candidats au test d'inscription</div>
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
                  <th>Adresse tutaire</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Misc</td>
                  <td>Dillo 0.8</td>
                  <td>Embedded devices</td>
                  <td>-</td>
                  <td>X</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Matricule</th>
                  <th>Noms</th>
                  <th>Genre</th>
                  <th>Télephone</th>
                  <th>Adresse tutaire</th>
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