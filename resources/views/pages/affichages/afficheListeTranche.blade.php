@extends("base")
@section("titre","Tranche")
@section("titre_page","Tranche | ".config('app.name'))
@section("sous_titre",config('app.name')."/Tranche")
@section("content")
<section class="content" style="width:100%;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <x-alertmessage />
            <div class="card-header row bg-primary">
              <div class="col-md-6">
                <div class="">Liste des tranches fixées</div>
                
              </div>
              <div class="col-md-6 text-md-right">
                  <a href="{{url("formTranche")}}" class="btn btn-outline-warning">Formulaire Tranche</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" style="font-size:11px;" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Libellé</th>
                  <th>Montant de la tranche</th>
                  <th>Année Académique</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($Listes as $Liste)
                  <tr>
                    <td>{{$Liste->id}}</td>
                    <td>{{$Liste->libTranche}}</td>
                    <td>{{$Liste->montantTranche}}</td>
                    <td>{{$Liste->libAnnee}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            
                            <a class="bg-danger dropdown-item" href="{{url('deleteTranche/'.$Liste->id)}}">
                               <i class="fas fa-trash"></i>
                                Supprimer
                              </a>
                            <a class="bg-warning dropdown-item" href="{{url('editTranche/'.$Liste->id)}}">
                              <i class="fas fa-edit"></i>
                              Editer
                            </a>
                            
                        </div>
                    </td>
                    
                  </tr>
                      
                  @empty
                      <tr>
                        <td>{{'Aucune donnée retrouvée!'}}</td>
                      </tr>
                  @endforelse
                </tbody>
                <tfoot>
                <tr>
                  <th>Code</th>
                  <th>Libellé</th>
                  <th>Montant de la tranche</th>
                  <th>Année Académique</th>
                  <th>Actions</th>
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