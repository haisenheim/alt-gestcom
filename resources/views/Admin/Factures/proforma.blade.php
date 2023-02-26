@extends('layouts.admin')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div id="invoice" class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <span class="float-left">
                       @if($facture->with_tva)
                       <a href="/admin/facture/tva/disable/{{ $facture->id }}" class="btn btn-xs btn-danger">Enlever TVA</a>
                       @else
                       <a href="/admin/facture/tva/enable/{{ $facture->id }}" class="btn btn-xs btn-info">Appliquer TVA</a>
                       @endif
                    </span>
                    <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
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

    </div>
    </div>



      <div class="actions" id="actions-section">
            <ul id="float-menu" style="position:fixed; top:150px; right:50px;" class="list-unstyled">
                <li class="">
                    <a  title="Imprimer" id="btn-print_" class="ripple" href="/admin/facture/print/{{ $facture->id }}"><i class="fa fa-print fa-lg text-info"></i></a>
                </li>
                @if($facture->reste>0)
                <li class="">
                    <a  title="Valider la proforma" class="ripple" href="/admin/valider/factures/{{ $facture->id }}"><i class="fa fa-check-circle fa-lg text-danger"></i></a>
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


