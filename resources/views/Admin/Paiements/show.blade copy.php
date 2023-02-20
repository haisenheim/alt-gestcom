
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
                    <fieldset>
                        <legend>SPECIALITES</legend>
                        <div class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#addSpecialite" class="btn btn-xs btn-warning">Ajouter</a>
                        </div>
                        <ul class="list-inline">
                            @foreach ($fournisseur->specialites as $specialite)
                                <li class="list-inline-item"><span class="badge badge-secondary">{{ $specialite->name }}</span></li>
                            @endforeach
                        </ul>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6">
            <div class="card card-warning card-outline card-tabs">
              <div class="card-header">
                    <h5 class="card-title">HISTORIQUE DES PRESTATIONS</h5>
              </div>
              <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>PRESTATION</th>
                                    <th>BENEFICIAIRE</th>
                                    <th>STATUT</th>
                                    <th>ENTREPRISE</th>
                                    <th>COUT</th>
                                    <th>OPERATEUR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fournisseur->consommations as $prestation)
                                    <tr>
                                        <td>{{ date_format($prestation->created_at,'d/m/Y H:i:s') }}</td>
                                        <td>{{ $prestation->acte->name }}</td>
                                        <td>{{ $prestation->assure->name }}</td>
                                        <td>{{ $prestation->statut }}</td>
                                        <td>{{ $prestation->entreprise->name }}</td>
                                        <td>{{ number_format($prestation->montant,0,',','.') }}</td>
                                        <td>{{ $prestation->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
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
