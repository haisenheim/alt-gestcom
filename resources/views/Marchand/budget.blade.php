
@extends('layouts.marchand')


@section('content')
    <style>
        ul#custom-tabs{
            margin: 0.5rem 0;
            background-color: transparent;
            padding: 0 10px;
            border: none;

        }
        .content-submenu a.nav-link.active {
            background: #1199EE;
            border: 1px solid #1199FF;
            color: #ffffff;
            border-radius: 5px;
            padding: 0.25rem 1.5rem;
            box-shadow: none;
        }
        .content-submenu a.nav-link {
            border: none;
            box-shadow: none;
            text-align: center;
            font-weight: bold;
            color: #cccccc
        }
        ul#custom-tabs .nav-item {
           width: 50%;
        }
    </style>
  <div class="container">

      <div class="">
                  <ul style="" class="nav nav-tabs content-submenu" id="custom-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-tous-tab" data-toggle="pill" href="#custom-tabs-tous" role="tab" aria-controls="custom-tabs-tous" aria-selected="true">Cashback</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-bienvenu-tab" data-toggle="pill" href="#custom-tabs-bienvenu" role="tab" aria-controls="custom-tabs-bienvenu" aria-selected="false">Factures NYOTA</a>
                    </li>
                  </ul>
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-tous" role="tabpanel" aria-labelledby="custom-tabs-tous">
                      <div class="container table-responsive">
                            <div style="" class="mt-2">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="btn btn-xs btn-warning" href="/marchand/bon/preview"><i class="">Previsualiser les bons d'achats</i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-xs btn-danger" href="/marchand/bon/generate"><i class="">Genener les bons d'achats</i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-xs btn-info" href="/marchand/bons"><i class="">Historique bons d'achats</i></a>
                                    </li>
                                </ul>
                            </div>
                              <table class="table table-striped table-sm table-hover data-table">
                                  <thead>
                                      <tr>
                                          <th>MOIS</th>
                                          <th>VENTES</th>
                                          <th>CASHBACK ATTRIBUE</th>
                                          <th>CASHBACK UTILISE</th>
                                          <th>STATUT</th>
                                          <th>
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @foreach ($cashbacks as $cashback)
                            
                                            <tr>
                                                <td>{{ $cashback->name }}</td>
                                                <td>{{ number_format($cashback->total_ventes,0,',','.') }}</td>
                                                <td>{{ number_format($cashback->total_cashback,0,',','.') }}</td>
                                                <td>{{ number_format($cashback->used,0,',','.') }}</td>
                                                <td><span class="badge badge-{{ $cashback->statut['color'] }}">{{ $cashback->statut['text'] }}</span></td>
                                                <td>
                                                </td>
                                            </tr>
                                        @endforeach
                                  </tbody>
                              </table>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-bienvenu" role="tabpanel" aria-labelledby="custom-tabs-bienvenu">
                    <div class="container table-responsive">
                        <table class="table table-striped table-sm table-hover data-table">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>&numero; de facture</th>
                                    <th>Cartes facturées</th>
                                    <th>Total TTC</th>
                                    <th>STATUT</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($factures as $facture)
                                      <tr>
                                          <td><a href="/marchand/facture/{{ $facture->token }}"> {{ $facture->moi->name. '-'. $facture->annee }}</a></td>
                                          <td><a href="/marchand/facture/{{ $facture->token }}"> {{ $facture->name }}</a></td>
                                          <td>{{ number_format(count($facture->details['data']),0,',','.') }}</td>
                                          <td>{{ number_format($facture->montant * (1+18.9/100),0,',','.') }}</td>
                                          <td><span class="badge badge-{{ $facture->statut['color'] }}">{{ $facture->statut['text'] }}</span></td>
                                          <td></td>
                                      </tr>
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                   </div>
                </div>

      </div>
  </div>
@endsection
