
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">TABLEAU DE BORD</h1>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <script src="{{ asset('js/chart.min.js') }}"></script>
  <div class="container-fluid dashboard">
    <div class="row mb-2">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="card card-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div id="created_block"></div>
                            <canvas id="myChartCartes" height="220"></canvas>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="kpi-content" id="kpi-cartes">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div>
                                            <h6>Cartes actives ce mois</h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span id="nb_actives" class="value"></span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="perfor"><span class="" id="fa_cartes_actives" ></span><span class="" id="perf_cartes_actives"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>
                                            <h6><span class="text-gray-dark">Bons d'achat édités</span></h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="value">0,2K</span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="perfor"><span class="fa fa-arrow-down text-danger text-bold"></span><span class="text-danger text-bold">-2%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="cashbask_block" class="list-group-item">

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---- Les ventes ---->
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="card card-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <canvas id="myChart" height="220"></canvas>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="kpi-content" id="kpi-ventes">
                                <ul id="ventes_list_right" class="list-group">
                                    <li class="list-group-item">
                                        <div>
                                            <h6>Panier moyen mensuel</h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span id="panier" class="value">52K FCFA</span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="perfor"><span id="fa-panier" class=""></span><span id="text-panier" class=""></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------- Fin des ventes -------->
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php $cartes = $achats->groupBy('carte_id');
                                $cartes_prev = $achats_prev->groupBy('carte_id');
                           //dd($cashback_prev->total_cartes - count($cartes));
                           $per_cartes = $cartes_prev?(count($cartes) - count($cartes_prev))*100/count($cartes_prev):100;
                           // dd($per_cartes);
                         ?>
                        <h1>{{ count($cartes) }}</h1>
                        <p>Cartes ce mois-ci</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <span class="fa fa-chart-line icon text-{{ $per_cartes>0?'success':'danger' }}"></span>
                            </div>
                            <div class="col-sm-12 col-md-10">
                                <span class="percent">{{ $per_cartes>0?'+'.number_format($per_cartes,0,',','.'):number_format($per_cartes,0,',','.') }}%</span> <br>
                                <p>par rapport au mois dernier à période comparable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <?php
                            $total_ventes = $achats->reduce(function($carry, $item){ return $item->montant + $carry; });
                            $tot = $achats_prev->reduce(function($carry, $item){ return $item->montant + $carry; });
                            //dd($tot);
                            $per_ventes = $tot?($total_ventes - $tot)*100/$tot:100;
                            //dd($per_ventes);
                            ?>
                        <h2>XAF {{ number_format($total_ventes,0,',','.')}}</h2>
                        <p>de vente realisees ce mois</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <span class="fa fa-chart-line icon text-{{ $per_ventes>0?'success':'danger' }}"></span>
                            </div>
                            <div class="col-sm-12 col-md-10">
                                <span class="percent">{{ $per_ventes>0?'+'.number_format($per_ventes,0,',','.'):number_format($per_ventes,0,',','.') }}%</span> <br>
                                <p>par rapport au mois dernier à période comparable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card bg-warning">

                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div id="chart" style="height: 50vh"></div>
                </div>
            </div>
    </div>
  </div>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  <canvas id="myChart" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('myChart');
$(document).ready(function(){

        $.ajax({
            url: '/kpi/fournisseur/intervalles',
            type:'get',
            dataType:'json',
            success:function(ret){
                console.log(Object.entries(ret.semaines));
                console.log(Object.entries(ret.data));
            },
            error:function(){

            }
        });

        $.ajax({
            url: '/kpi/fournisseur/ventes',
            type:'get',
            dataType:'json',
            success:function(ret){
                console.log(ret);
                $('#panier').text(ret.panier.montant);
               $('#text-panier').text(ret.panier.prog).addClass(ret.panier.text);
                $('#fa-panier').addClass(ret.panier.fa);

                var tranches = Object.entries(ret.tranches);
                var keys = Object.keys(ret.tranches);
                //console.log(tranches);
                for(let i=0;i<keys.length;i++){
                    var tranche = tranches[i][1];
                    var key = tranches[i][0];
                    var colors=['indigo','info','cyan','teal','warning','primary','orange']
                    //console.log("index : "+key);
                    //console.log(tranche);
                    var li = `<li class="list-group-item">
                                        <div>
                                            <h6>TRANCHE <span class="text-${colors[i]}">${key}</span></h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="value">${tranche.count}</span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="perfor"><span class="${tranche.fa}"></span><span class="${tranche.text} text-bold">${tranche.progression}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>`;
                     $('#ventes_list_right').append(li);
                };

                var ventes = ret.ventes;
                const labels = Object.keys(ventes);
                const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Par mois',
                        data:  Object.values(ventes),
                        backgroundColor: '#ee4444',
                        borderColor: '#ee4455',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Ventes',
                            align:'start',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            },
            error: function(){
                console.log("Une erreur au chargement des cartes");
            }
        });
    });
</script>

<!---- Chargement des cartes ----->
<script>
    $(document).ready(function(){
        $.ajax({
            url: '/kpi/fournisseur/cartes',
            type:'get',
            dataType:'json',
            success:function(ret){

               // console.log(ret);
                let created_block = `
                    <span id="nb-created">${ret.created.nb}</span> <span class="perfor"><span class="${ret.created.fa}" id="fa-created"></span><span class="${ret.created.text}" id="text-created">${ret.created.prog}</span></span>
                `;
                $('#created_block').html(created_block);
                $('#nb_actives').text(ret.active.nb);
                $('#perf_cartes_actives').text(ret.active.prog).addClass(ret.active.text);

                $('#fa_cartes_actives').addClass(ret.active.fa);
                var cashback = ret.cashback;
                var cashback_block = `<div>
                              <h6>Cash back attribués </span></h6>
                              <div class="row">
                                  <div class="col-6">
                                      <span class="value">${cashback.nb}</span>
                                  </div>
                                  <div class="col-6 text-right">
                                      <span class="perfor"><span class="${cashback.fa} text-bold"></span><span class="${cashback.text} text-bold">${cashback.prog}</span></span>
                                  </div>
                              </div>
                          </div>`;
                $('#cashbask_block').html(cashback_block);

                var cartes = ret.cartes;
                const labels = Object.keys(cartes);
                const data = {
                labels: labels,
                datasets: [{
                    label: 'Cartes',
                    data: Object.values(cartes),
                    fill: false,
                    borderColor: '#83bbd7',
                    tension: 0.1
                }]
                };
                const config = {
                    type: 'line',
                    data: data,
                    options:{
                        plugins: {
                            title: {
                            display: true,
                            text: 'Cartes créées',
                            color:'#222',
                            align:'start',
                            font: {
                                        size: 12,
                                        family:'Inter-Medium',
                                    }
                            },
                            legend: {
                                display: false,
                                labels: {
                                    // This more specific font property overrides the global property

                                    font: {
                                        size: 12,
                                        family:'Inter-Medium'
                                    }
                                }
                            }
                        }
                    }
                };
                const myChartCartes = new Chart(
                    document.getElementById('myChartCartes'),
                    config
                );
            },
            error: function(){
                console.log("Une erreur au chargement des cartes");
            }
        });
    });
</script>

  <style>
     div#created_block{
        font-family: 'Inter-Medium';
    }
    div#created_block #nb-created{
        font-family: 'Inter-Medium';
        font-size: 1rem;
        font-weight: 900;
    }

    div.card{
        min-height: 200px;
        margin: 20px 10px;
        border-radius: 0.8rem;
    }
    span.icon{
        font-size: 3.75rem;
        font-weight: 700;
    }
    span.percent{
        font-size: 1.25rem;
        font-weight: 700;
    }
    div.kpi-content>ul .list-group-item{
        padding: 0.2rem 1.15rem;
    }

    div.kpi-content h6{
        font-size: 0.6rem;
        font-weight: 700;
        margin: 2px -15px;
    }
    div.kpi-content .col-6{
        padding: 0;
    }
    div.kpi-content .value{
        font-size: 0.6rem;
        font-weight: 600;
    }
    div.kpi-content .perfor{
        font-size: 0.7rem;
        font-weight: 900;
    }

    div.kpi-content span.value{
        font-family: 'Inter-Black';
    }
    div.kpi-content span.perfor{
        font-family: 'Inter-Medium';
        font-size: 9px;
    }

    div.kpi-content .card{
        font-family: 'Inter-Medium';
    }
    span.perfor{
        font-size: 0.7rem;
    }

  </style>


@endsection
