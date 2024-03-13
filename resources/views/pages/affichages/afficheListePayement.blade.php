@extends("base")
@section("titre","Payement")
@section("titre_page","Payement | ".config('app.name'))
@section("sous_titre",config('app.name')."/Payement")
@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" >

          <div class="card" style="background:url('dist/img/bg3.jpeg');">
            <x-alertmessage />
            <div class="card-header row" style="background-color:rgb(12, 116, 161);">
              <div class="col-md-6">
                <div class="font-italic font-weight-bold h5 text-light"><i class="fas fa-users"></i> Candidats ayant payé</div>
                
              </div>
              <div class="col-md-6 text-md-right">
                  <a href="{{url("formPayement")}}" class="btn btn-outline-light">Formulaire Payement</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" style="font-size:14px;" class="table table-bordered table-striped">
                <thead>
                <tr class="text-light" style="background-color:rgb(12, 116, 161);">
                  
                  <th>Photo</th>
                  <th>Etudiant</th>
                  <th>Montant payé</th>
                  <th>Motif</th>
                  <th>Date du paiement</th>
                  <th>Montant Restant</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($Payements as $Payement)
                  <tr>
                    <td><img src="{{ asset('uploads/etudiant/'.$Payement->photo) }}" class="img-fluid rounded-circle" width="45" alt="profile"></td>
                    <td>{{$Payement->nom." ".$Payement->postnom." ".$Payement->postnom}}</td>
                    <td>{{$Payement->montantTranche." Fc" }}</td>
                    <td>{{$Payement->libtranche}}</td>
                    <td>{{date("d/m/Y H:i:s", strtotime($Payement->dateTranche)) }}</td>
                    <td>30000</td>
                    <td>
                      <div class="btn-group">
                        
                            <a class="bg-warning dropdown-item" href="{{url('editPayer/'.$Payement->tranche_id)}}">
                              <i class="fas fa-file-alt"></i>
                              
                              Detail
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
                <tr class="text-light" style="background-color:rgb(12, 116, 161);">
                  <th>Photo</th>
                  <th>Etudiant</th>
                  <th>Montant payé</th>
                  <th>Motif</th>
                  <th>Date du paiement</th>
                  <th>Montant Restant</th>
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