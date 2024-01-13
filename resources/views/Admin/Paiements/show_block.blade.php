
@extends('layouts.admin')

@section('content')
  <div class="">
        <h3>JOURNAL DES ENTREES</h3>
        <div class="card card-light">
            <div class="card-header">
                <div class="float-md-right">
                    <a class="btn btn-sm btn-info" href="/admin/print/paiements/{{ $du }}/{{ $au }}/{{ isset($client)?$client->id:0 }}"><i class="fa fa-print"></i> Imprimer</a>
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
                        <?php $somme = 0; ?>
                        @foreach ($paiements as $paiement)
                        <?php $somme = $somme + $paiement->montant; ?>
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
                <div><span>TOTAL : </span><span class="badge badge-info">{{ number_format($somme,0,',','.') }} FCFA</span></div>
            </div>
        </div>
  </div>

  <!-- /.modal -->
@endsection
