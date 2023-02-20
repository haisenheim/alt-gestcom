
@extends('layouts.admin')


@section('content')
<script src="{{ asset('js/chart.min.js') }}"></script>
  <div class="container p-3">
        <h4>TABLEAU DE BORD</h4>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p><span class="text-bold">Factures mensuelles</span></p>
                        <p>
                            <span style="font-size: 0.75rem">Factures créées dans le mois</span>
                        </p>
                        <div class="m-3 float-lg-right">
                            <span style="font-size: 1.5rem" class="text-bold">{{ isset($nbfm)?number_format($nbfm,0,',','.'):'-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p><span class="text-bold">Chiffre d'affaires mensuel</span></p>
                        <p>
                            <span style="font-size: 0.75rem">Montant total des factures du mois en cours</span>
                        </p>
                        <div class="m-0 float-lg-right">
                            <span style="font-size: 1.5rem" class="text-bold">{{ number_format($cam,0,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card bg-gradient-green">
                    <div class="card-body">
                        <p><span class="text-bold">Chiffre d'affaire annuel</span></p>
                        <p>
                            <span style="font-size: 0.75rem">-</span>
                        </p>
                        <div class="m-3 float-lg-right">
                            <span style="font-size: 1.5rem" class="text-bold">{{ number_format($cay,0,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p><span class="text-bold">Recouvrement mensuelles</span></p>
                        <p>
                            <span style="font-size: 0.75rem">Total des sommes recoltees dans le mois</span>
                        </p>
                        <div class="m-3 float-lg-right">
                            <span style="font-size: 1.5rem" class="text-bold">{{ number_format($rcm,0,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p><span class="text-bold">Recouvrement annuelles</span></p>
                        <p>
                            <span style="font-size: 0.75rem">Total des sommes recoltees dans l'annee</span>
                        </p>
                        <div class="m-3 float-lg-right">
                            <span style="font-size: 1.5rem" class="text-bold">{{ number_format($rcy,0,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <style>
    div.card-section-1{
        height:120px;
    }
    div.card-section-2{
        height:150px;
    }
    div.card{
            height: 175px;
        }
  </style>

@endsection
