
@extends('layouts.admin')



@section('content')
  <div class="row pt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary">{{ $courtier->name }}</div>
                <div class="card-body">
                    <div>
                        <p>{{ $courtier->address }}</p>
                    </div>
                    <h6><span class="label fa fa-phone"></span> <span class="value">{{ $courtier->phone }}</span></h6>
                    <h6><span class="label fa fa-envelope"> </span> <span class="value">{{ $courtier->email }}</span></h6>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6">
            <div class="card card-warning card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="agents-tab" data-toggle="pill" href="#custom-tabs-agents" role="tab" aria-controls="custom-tabs-agents" aria-selected="true">COMPTES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contrats-tab" data-toggle="pill" href="#custom-tabs-contrats" role="tab" aria-controls="custom-tabs-contrats" aria-selected="false">POLICES</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">

                  <div class="tab-pane fade show active" id="custom-tabs-agents" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <div class="pull-right">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button data-target="#addAgent" data-toggle="modal" class="btn btn-xs btn-secondary"><i class="fa fa-plus-circle" title="Ajouter un agent"></i></button>
                            </li>
                        </ul>
                      </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover data-table">
                            <thead>
                                <tr>
                                    <th>NOM</th>
                                    <th>EMAIL</th>
                                    <th>TELEPHONE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courtier->users as $agent)
                                    <tr>
                                        <td>{{ $agent->name }}</td>
                                        <td>{{ $agent->email }}</td>
                                        <td>{{ $agent->phone }}</td>
                                        <td>
                                            @if($agent->active)
                                                <a title="bloquer" class="btn btn-sm btn-danger" href="/admin/compte/disable/{{ $agent->token }}"><i class="fa fa-lock"></i></a>
                                            @else
                                            <a title="debloquer" class="btn btn-sm btn-success" href="/admin/compte/enable/{{ $agent->token }}"><i class="fa fa-unlock"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-contrats" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class="pull-right">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button data-target="#addExercice" data-toggle="modal" class="btn btn-xs btn-secondary"><i class="fa fa-plus-circle" title="Ajouter un agent"></i></button>
                            </li>
                        </ul>
                      </div>
                        <div class="table-responsive">
                           <table class="table table-sm table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PERIODE DE VALIDITE</th>
                                        <th>PRIME</th>
                                        <th>TOTAL SINITRES</th>
                                        <th>S/P</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courtier->polices as $exercice)
                                       <tr>
                                        <td><span class="badge badge-{{ $exercice->status['color'] }}">{{ $exercice->status['name'] }}</span></td>
                                        <td><a href="/admin/entreprise/police/{{ $exercice->id }}">{{ $exercice->periode }}</a></td>
                                        <td>{{ number_format($exercice->prime,0,',','.') }}</td>
                                        <td>{{ number_format($exercice->total_sinistre,0,',','.') }}</td>
                                        <td>{{ number_format($exercice->sp,2,',','.') }}%</td>
                                       </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
  </div>

  <div class="modal fade" id="addLot">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">NOUVEAU LOT DE CARTES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/entreprises/generate-cards">
            <div class="modal-body">
                <input type="hidden" name="entreprise_id" value="{{ $courtier->id }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="number" name="quantity" placeholder="Quantite" class="form-control">
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-secondary">Enregistrer</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="addAgent">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEL UTILISATEUR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/users">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="courtier_id" value="{{ $courtier->id }}">
            <input type="hidden" name="role_id" value="8">
          <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" required name="name" placeholder="NOM" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="phone" required placeholder="Telephone" class="form-control">
                    </div>
                </div>

                <div class="col-md-7 col-sm-12">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Adresse email" class="form-control">
                    </div>
                </div>

            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="password" name="password" required placeholder="Mot de passe" class="form-control">
                </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="addExercice">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE POLICE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/entreprises/exercice">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="entreprise_id" value="{{ $courtier->id }}">
          <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">DU</label>
                        <input type="date" required name="from"  class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">AU</label>
                        <input type="date" required name="to"  class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">PRIME</label>
                        <input type="number" required name="prime" placeholder="Prime" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-secondary">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



@endsection
