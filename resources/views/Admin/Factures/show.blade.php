@extends('layouts.admin')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div id="invoice" class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between gap-1">
                        <div class="d-flex justify-content-start">
                            <div>
                                <span class="">
                                    @if($facture->with_tva)
                                    <a href="/admin/facture/tva/disable/{{ $facture->id }}" class="btn btn-xs btn-danger">Enlever TVA</a>
                                    @else
                                    <a href="/admin/facture/tva/enable/{{ $facture->id }}" class="btn btn-xs btn-info">Appliquer TVA</a>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <a data-toggle="modal" data-target="#bcModal" class="btn btn-xs btn-warning" href="#">BC</a>
                            </div>
                            @if($facture->statut)
                            <div>
                                <a class="btn btn-xs btn-primary" href="/admin/factures/bl/{{ $facture->id }}">BL</a>
                            </div>
                            @endif
                        </div>
                        <div>
                            <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              @if($facture->bc)
                    <p><strong>BON DE COMMANDE : <span>{{ $facture->bc }}</span></strong></p>
                @endif
              <div class="row invoice-info">
                @if ($facture->client)
                <div class="col-sm-4 invoice-col">
                    CLIENT:
                    <address>
                      <strong>{{ $facture->client->name }} </strong><br>
                      {{ $facture->client->adresse }}<br>

                      Téléphone: {{ $facture->client->telephone }}<br>
                      Email: {{ $facture->client->email }}<br/>

                    </address>
                </div>
                @else
                <div class="col-sm-4 invoice-col">
                    CLIENT:
                    <address>
                      <strong>{{ $facture->client_name }} </strong><br>
                    </address>
                </div>
                @endif
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant, 0,',','.') }} </b><br>
                  <br>

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b><span style="font-size: 12px; font-weight: 500">DELAI</span> : <span style="font-size: 12px; font-weight: 700">{{ $facture->delai?$facture->delai->name.' Jours':'Paiement immediat' }}</span> </b><br>
                    <br>

                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>

                                <th>DESIGNATION</th>
                                <th>PU</th>
                                <th>QUANTITE</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($facture->lignes as $ligne)
                                    <tr>
                                       <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                       <td>{{ number_format($ligne->pu,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->quantite,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->montant,0,',','.') }}</td>
                                    </tr>

                            @endforeach
                            @if($facture->with_tva)
                                <tr>
                                    <th style="text-align: right;" colspan="3">MONTANT HT</th>
                                    <th style="text-align: left;">{{ number_format($facture->total,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;" colspan="3">TVA</th>
                                    <th style="text-align: left;">{{ number_format($facture->tva,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right" colspan="3">CA</th>
                                    <th style="text-align: left;">{{ number_format($facture->ca,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;" colspan="3">NET A PAYER</th>
                                    <th style="text-align: left;">{{ number_format($facture->montant,0,',','.') }}</th>
                                </tr>
                            @else
                            <tr>
                                <th style="text-align: right;" colspan="3">TOTAL HT</th>
                                <th style="text-align: left;">{{ number_format($facture->montant,0,',','.') }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>

              </div>

            <!-- /.invoice -->
        </div>
        <hr>
        <div class="card bg-light mt-3">
            <div class="card-header">
                <h3 class="card-title">HISTORIQUE DES PAIEMENTS</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>REFERENCE</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facture->paiements as $paiement)
                            <tr>
                                <td>{{ date_format($paiement->created_at,'d/m/Y H:i') }}</td>
                                <td>{{ $paiement->reference }}</td>
                                <td>{{ number_format($paiement->montant,0,',','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="bcModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">IMPUTER UN BC</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="POST" action="/admin/factures/bc">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" value="{{ $facture->id }}">
              <div class="">
                  <div class="d-flex gap-2">
                      <div class="">
                          <input type="text" name="bc" placeholder="Numero du bon de commande" class="form-control">
                      </div>
                      <div class="">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Imputer</button>
                      </div>
                  </div>

              </div>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="payerModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">NOUVEAU PAIEMENT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="POST" action="/admin/paiements">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="facture_id" value="{{ $facture->id }}">
              <div class="row">
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                          <input type="number" name="montant" placeholder="Montant" class="form-control">
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

    <div class="modal fade" id="addComModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">NOUVELLE COMMISSION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="POST" action="/admin/factures/commission">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="facture_id" value="{{ $facture->id }}">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                           <select name="commerciale_id" id="" required class="form-control">
                                <option value="">Commercial ...</option>
                                @foreach ($coms as $com)
                                    <option value="{{ $com->id }}">{{ $com->name }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                          <input type="number" name="montant" placeholder="Montant" class="form-control">
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="memo" placeholder="Memo" class="form-control">
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

      <div class="actions" id="actions-section">
            <ul id="float-menu" style="position:fixed; top:150px; right:50px;" class="list-unstyled">
                <li class="">
                    <a  title="Imprimer" id="btn-print_" class="ripple" href="/admin/facture/print/{{ $facture->id }}"><i class="fa fa-print fa-lg text-info"></i></a>
                </li>
                <li class="">
                    <a  title="Ajouter commisssion" data-toggle="modal" data-target='#addComModal' class="ripple" href="#"><i class="fa fa-users fa-lg text-danger"></i></a>
                </li>
                @if($facture->reste>0)
                <li class="">
                    <a  title="Effectuer un paiement" data-toggle="modal" data-target='#payerModal' class="ripple" href="#"><i class="fa fa-coins fa-lg text-warning"></i></a>
                </li>
                @endif
                @if($facture->versement==0)
                <li class="">
                    <a  title="Modfier"  href='/admin/factures/edit/{{ $facture->id }}' class="ripple"><i class="fa fa-edit fa-lg text-success"></i></a>
                </li>
                @endif
        </ul>
      </div>
    <style>
        div.content{
            background-color: #eeeeee;
        }
    </style>
    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script>
        $('#btn-print').click(function(){
            $("#invoice").print({
                addGlobalStyles : true,
                stylesheet : null,
                rejectWindow : true,
                noPrintSelector : ".no-print",
                iframe : true,
                append : null,
                prepend : null
            });
        });
    </script>
@endsection


