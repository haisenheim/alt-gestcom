
@extends('layouts.admin')



@section('content')
  <div class="row pt-2">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4><span class="text-bold"></span> <span>{{ $item->name }}</span></h4>

                    <h6><span class="value">{{ $item->telephone }}</span></h6>

                    <h6><span>CLIENT : </span> <span class="value">{{ $item->client?$item->client->name:'-' }}</span></h6>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="agents-tab" data-toggle="pill" href="#custom-tabs-agents" role="tab" aria-controls="custom-tabs-agents" aria-selected="true">LISTE DES COMMISSIONS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contrats-tab" data-toggle="pill" href="#custom-tabs-contrats" role="tab" aria-controls="custom-tabs-contrats" aria-selected="false">PAIEMENTS</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent">

                    <div class="tab-pane fade show active" id="custom-tabs-agents" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <div class="float-right">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <button data-target="#addCom" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une commission"></i> Nouvelle Commission</button>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <div class="">
                                <table class="table table-striped table-sm data-table">
                                    <thead>
                                        <th>DATE</th>
                                        <th>DESIGNATION</th>
                                        <th>FACTURE</th>
                                        <th>MONTANT</th>
                                        <th>VERSEMENT</th>
                                        <th>RESTE</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->commissions as $commission)
                                            <tr>
                                                <td>{{ date_format($commission->created_at,'d/m/Y H:i') }}</td>
                                                <td>{{ $commission->name }}</td>
                                                <td>{{ $commission->facture?$commission->facture->reference:'-' }}</td>
                                                <td>{{ number_format($commission->montant,0,',','.') }}</td>
                                                <td>{{ number_format($commission->versement,0,',','.') }}</td>
                                                <td>{{ number_format($commission->reste,0,',','.') }}</td>
                                                <td>
                                                    @if($commission->reste)
                                                        <a href="#" data-id="{{ $commission->id }}" data-target="#addPaiement" data-toggle="modal" class="btn btn-xs btn-warning btn-add" title="Ajouter un paiement"><i class="fa fa-1x fa-coins"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-contrats" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                          <div class="table-responsive">
                              <table class="table table-bordered table-sm table-hover data-table">
                                  <thead>
                                        <tr>
                                              <th>DATE</th>
                                              <th>MONTANT</th>
                                              <th>FACTURE</th>
                                          </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($item->paiements as $paiement)
                                          <tr>
                                              <td>{{ date_format($paiement->created_at,'d/m/Y H:i') }}</td>
                                              <td>{{ number_format($paiement->montant,0,',','.') }}</td>
                                              <td><a href="/admin/factures/{{ $paiement->facture_id }}">{{ $paiement->facture->reference }}</a></td>
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
  <div class="modal fade" id="addCom">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE COMMISSION</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/admin/commerciale/commission" method="post">
                @csrf
                <input type="hidden" name="commerciale_id" value="{{ $item->id }}">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                      <div class="form-group">
                          <select name="facture_id" id="client_id" required class="form-control">
                              <option value="">Facture ...</option>
                              @foreach ($factures as $type)
                                  <option value="{{ $type->id }}">{{ $type->reference }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                          <input type="text" placeholder="Memo" name="name" id="name" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                         <input type="number" name="montant" class="form-control" id="">
                      </div>
                  </div>
                </div>
                  <div>
                      <button type="submit" class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
                  </div>
            </form>
        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="addPaiement">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU PAIEMENT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/admin/commerciale/payer" method="post">
                @csrf
                <input type="hidden" name="commerciale_id" value="{{ $item->id }}">
                <input type="hidden" name="commission_id" id="commission_id">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                         <input type="number" name="montant" class="form-control" id="">
                      </div>
                  </div>
                </div>
                  <div>
                      <button type="submit" class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
                  </div>
            </form>
        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>
    $('.btn-add').click(function(){
        $('#commission_id').val($(this).data('id'));
    });
  </script>
@endsection
