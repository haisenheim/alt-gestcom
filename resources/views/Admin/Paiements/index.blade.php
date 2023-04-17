
@extends('layouts.admin')

@section('content')
  <div class="">
        <h3>JOURNAL DES ENTREES</h3>
        <div class="card card-light">
            <div class="card-header">
                <div>
                    <form action="/admin/paiement/block" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">DU</label>
                                    <input type="date" name="du" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">AU</label>
                                    <input type="date" name="au" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">CLIENT</label>
                                    <select name="client_id" id="" class="form-control">
                                        <option value="">Client ...</option>
                                        @foreach ($clients as $cl)
                                            <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <div style="padding-top:10px" class="form-group">
                                    <button type="submit" title="Search" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>DATE</th>
                                <th>REFERENCE</th>
                                <th>MONTANT</th>
                                <th>FACTURE</th>
                                <th>CLIENT</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($paiements as $paiement)
                            <tr>
                                <td>{{ date_format($paiement->created_at,'d/m/Y H:i') }}</td>
                                <td>{{ $paiement->reference }}</td>
                                <td>{{ number_format($paiement->montant,0,',','.') }}</td>
                                <td><a href="/admin/factures/{{ $paiement->facture_id }}">{{ $paiement->facture->reference }}</a></td>
                                <td><a href="/admin/clients/{{ $paiement->facture->client_id }}">{{ $paiement->facture->client?$paiement->facture->client->name:'Client de passage' }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $paiements->links() }}
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU PAIEMENT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prestataires">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Nom" class="form-control">
                  </div>
              </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Telephone" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="email" placeholder="email" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" name="address" placeholder="Adresse" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="logo">CLIENT</label>
                    <select name="client_id" id="client_id" required class="form-control">
                        <option value="">CLIENT ...</option>
                        @foreach ($clients as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="logo">VILLE</label>
                    <select name="ville_id" id="" required class="form-control">
                        <option value="">FACTURE ...</option>

                    </select>
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
  <!-- /.modal -->
@endsection
