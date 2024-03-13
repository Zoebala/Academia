<div class="text-center">

    <button  type="button" class="btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#modal-default">
       <i class="fas fa-graduation-cap"></i> s'inscrire
    </button>
    <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-graduation-cap"></i> Inscription</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Cette opération est subdivisée en 4 étapes </p>
                </div>
                <div class="modal-footer justify-content-between">
                  {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> --}}
                  <a href="{{url('etudiant')}}" class="btn btn-primary">je comprends!</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    </div>