
@extends('layouts.admin')



@section('content')
  <div class="row pt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <p>
                            <span class="text-bold text-xl">{{ $client->name }}</span>
                        </p>
                    </div>
                    <div>
                        <p>{{ $client->address }}</p>
                    </div>
                    <h6> TELEPHONE : <span class="value">{{ $client->telephone }}</span></h6>
                    <h6>Email :</span> <span class="value">{{ $client->email }}</span></h6>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="agents-tab" data-toggle="pill" href="#custom-tabs-agents" role="tab" aria-controls="custom-tabs-agents" aria-selected="true">FACTURES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contrats-tab" data-toggle="pill" href="#custom-tabs-contrats" role="tab" aria-controls="custom-tabs-contrats" aria-selected="false">PAIEMENTS</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">

                  <div class="tab-pane fade show active" id="custom-tabs-agents" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                      <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover data-table">
                            <thead>
                                  <tr>
                                        <th>DATE</th>
                                        <th>&numero;</th>
                                        <th>MONTANT</th>
                                        <th>VERSEMENT</th>
                                        <th>RESTE</th>
                                        <th>STATUT</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($client->factures as $fournisseur)
                                    <tr>
                                        <td>{{ date_format($fournisseur->created_at,'d/m/Y H:i') }}</td>
                                        <td><a href="/admin/factures/{{ $fournisseur->id }}"> {{ $fournisseur->reference }}</a></td>

                                        <td>{{ number_format($fournisseur->montant,0,',','.') }}</td>
                                        <td>{{ number_format($fournisseur->versement,0,',','.') }}</td>
                                        <td>{{ number_format($fournisseur->reste,0,',','.') }}</td>
                                        <td><span class="badge badge-{{ $fournisseur->status['color'] }}">{{ $fournisseur->status['name'] }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-contrats" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover data-table">
                                <thead>
                                      <tr>
                                            <th>DATE</th>
                                            <th>REFERENCE</th>
                                            <th>MONTANT</th>
                                            <th>FACTURE</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client->paiements as $paiement)
                                        <tr>
                                            <td>{{ date_format($paiement->created_at,'d/m/Y H:i') }}</td>
                                            <td>{{ $paiement->reference }}</td>
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



@endsection
