
@extends('layouts.admin')



@section('content')
  <div class="row pt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary">{{ $fournisseur->name }}</div>
                <div class="card-body">
                    <div>
                        <p>{{ $fournisseur->address }}</p>
                    </div>
                    <h6><span class="label fa fa-phone"></span> <span class="value">{{ $fournisseur->phone }}</span></h6>
                    <h6><span class="label fa fa-envelope"> </span> <span class="value">{{ $fournisseur->email }}</span></h6>
                    <h6><span class="label text-danger fa fa-1x fa-map-marker"></span> <span class="value">{{ $fournisseur->ville?$fournisseur->ville->name:'-' }}</span></h6>
                    <h6> <span class="text-warning">VILLE: </span> {{ $fournisseur->ville?$fournisseur->ville->name:'-' }} </h6>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6">
            <div class="card card-warning card-outline card-tabs">
              <div class="card-header">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="agents-tab" data-toggle="pill" href="#factures-tab" role="tab" aria-controls="custom-tabs-agents" aria-selected="true">FACTURE</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contrats-tab" data-toggle="pill" href="#actes-tab" role="tab" aria-controls="custom-tabs-contrats" aria-selected="false">PRESTATIONS</a>
                    </li>
                </ul>
              </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="factures-tab" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover data-table">
                                    <thead>
                                        <tr>
                                                <th>&numero;</th>
                                                <th>MOIS</th>
                                                <th>MONTANT</th>
                                                <th>STATUT</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fournisseur->factures as $facture)
                                            <tr>
                                                <td><a href="/admin/factures/{{ $facture->token }}"> {{ $facture->name }}</a></td>
                                                <td>{{ $facture->mois?$facture->month->name:'-' }} / {{ $facture->annee }}</td>
                                                <td>{{ number_format($facture->montant,0,',','.') }}</td>
                                                <td>-</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="actes-tab" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <div class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#addActe" class="btn btn-xs btn-warning">Ajouter</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th>DESIGNATION</th>
                                            <th>PRIX UNITAIRE</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $item->acte->name }}</td>
                                                <td>{{ number_format($item->montant,0,',','.') }}</td>
                                                <td>-</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
  </div>

  <div class="modal fade" id="addActe">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE PRESTATION</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prestataires/acte/add">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="prestataire_id" value="{{ $fournisseur->id }}">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                       <select name="acte_id" id="" required class="form-control">
                            <option value="">SELECTIONNER UNE PRESTATIONS</option>
                            @foreach ($actes as $spec)
                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="montant" placeholder="Montant" required class="form-control">
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

  <div class="modal fade" id="addSpecialite">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE SPECIALITE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prestataires/addSpecialite">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="prestataire_id" value="{{ $fournisseur->id }}">
          <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                       <select name="specialite_id" id="" required class="form-control">
                            <option value="">SELECTIONNER UNE SPECIALITE</option>
                            @foreach ($specialites as $spec)
                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                            @endforeach
                       </select>
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
