@extends("base")
@section("titre","Option")
@section("sous_titre",config('app.name')."/option")
@section("content")


    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content" style="width:100%;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-alertmessage />
              <div class="card-header row text-light" style="background-color:rgb(12, 116, 161);">
                    <div class="col-lg-8 col-md-8">
                      <h4 class="font-italic"><i class="fas fa-book" aria-hidden="true"></i> Mentions Organisées</h4>
                  </div>
                  {{-- pour gérer le bouton étape suivante --}}
               
                  <div class="col-lg-2 col-md-2 text-lg-right text-secondadry">
                    @if (session("idOption")!=null)
                      <a href="@if(session('IdEtudiant')){{'formUploadFiles/'.session('IdEtudiant').'/'.session("idOption")}}@else{{'formUploadFiles/'.session("idOption")}} @endif" class="font-italic btn btn-outline-light">Etape suivante</a>                            
                    @endif
                </div>
                  <div class="col-lg-2 col-md-2 text-lg-right text-secondadry">
                      <span class="font-weight-bold font-italic">Etape 2/4</span>
                  </div>
              </div>
              
              <div class="card-body" style="background:url('dist/img/bg3.jpeg');">
                <div>
                  <div class="btn-group row w-100 mb-2">
                      <a class="btn btn-info col-lg-3 col-md-6 col-sm-6 active" href="javascript:void(0)" data-filter="all"> Toutes</a>
                    {{-- affichages sections --}}
                      @foreach($Sections as $section)
                        <a class="btn btn-info col-lg-3 col-md-6 col-sm-6" href="javascript:void(0)" data-filter="{{$section->id}}">{{$section->libSection}} </a>
                      @endforeach
                    
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Mélanger les éléments </a>
                    {{-- <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascendant </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descendant </a>
                      </div>
                    </div> --}}
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    {{-- affichages liste des options --}}
                    @foreach($Options as $Option)
                      <div class="filtr-item col-sm-6 col-md-3 text-center mt-2" data-category="{{$Option->idSec}}" data-sort="{{$Option->libDepartement}}">
                          <a href="{{asset('uploads/options/'.$Option->photo)}}" data-toggle="lightbox" data-title="{{"Departement - ".$Option->libDepartement}}">
                              <img src="{{asset('uploads/options/'.$Option->photo)}}" style="width:250px; height:250px;" class="img-fluid mb-2 rounded" alt="{{$Option->libDepartement}}"/>
                          </a><br>
                          <div class="text-center">
                            @if (session("idOption")==null)
                                
                              <a href="@if(session('IdEtudiant')){{'formUploadFiles/'.session('IdEtudiant').'/'.$Option->idOption}}@else{{'formUploadFiles/'.$Option->idOption}} @endif" class="btn btn-outline-light py-2" >
                               <i class="fas fa-book"></i> {{$Option->libOption}}
                              </a>
                            @endif
                          </div>
                     </div>
                    @endforeach
                   
                  </div>
                </div>

              </div>
            </div>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 

@endsection