
@extends('layouts.marchand')



@section('content')
  <div class="container-fluid">
    <div class="">
        <div class="p-0 pt-1">
          <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-menu" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Affluence</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Panier moyen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Avis & Notation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Segmentation</a>
            </li>
          </ul>
        </div>
        <div class="">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                <div class="p-0 pt-1">
                    <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-jour-tab" data-toggle="pill" href="#custom-tabs-jour" role="tab" aria-controls="custom-tabs-jour" aria-selected="true">Le jour</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-semaine-tab" data-toggle="pill" href="#custom-tabs-semaine" role="tab" aria-controls="custom-tabs-semaine" aria-selected="false">La semaine</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-mois-tab" data-toggle="pill" href="#custom-tabs-mois" role="tab" aria-controls="custom-tabs-mois" aria-selected="false">Le mois</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-annee-tab" data-toggle="pill" href="#custom-tabs-annee" role="tab" aria-controls="custom-tabs-annee" aria-selected="false">L'année</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-jour" role="tabpanel" aria-labelledby="custom-tabs-jour">
                        <div class="container">
                                <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Ajourd'hui <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                                <div class="row pt-2">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="chart">
                                                    <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                                  </div>
                                            </div>
                                            <div class="card-footer">
                                                <h6>Nombre de passage au caisse</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="chart">
                                                    <canvas id="barChart2" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                                  </div>
                                            </div>
                                            <div class="card-footer">
                                                <h6>Durée moyenne (en min) aux caisses</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-semaine" role="tabpanel" aria-labelledby="custom-tabs-semaine">
                        <p>La semaine
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                        </p>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-mois" role="tabpanel" aria-labelledby="custom-tabs-mois">
                        <p>Le mois
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                        </p>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-annee" role="tabpanel" aria-labelledby="custom-tabs-annee">
                        <p>L'annee
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                        </p>
                     </div>
                  </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                <div class="p-0 pt-1">
                    <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-panier-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-panier-jour-tab" data-toggle="pill" href="#custom-tabs-panier-jour" role="tab" aria-controls="custom-tabs-panier-jour" aria-selected="true">Le jour</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-panier-semaine-tab" data-toggle="pill" href="#custom-tabs-panier-semaine" role="tab" aria-controls="custom-tabs-panier-semaine" aria-selected="false">La semaine</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-panier-mois-tab" data-toggle="pill" href="#custom-tabs-panier-mois" role="tab" aria-controls="custom-tabs-panier-mois" aria-selected="false">Le mois</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-panier-annee-tab" data-toggle="pill" href="#custom-tabs-panier-annee" role="tab" aria-controls="custom-tabs-panier-annee" aria-selected="false">L'année</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="custom-tabs-panier-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-panier-jour" role="tabpanel" aria-labelledby="custom-tabs-panier-jour">
                        <div class="container">
                                <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Aujourd'hui <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                                <div class="row pt-2">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">

                                            </div>
                                            <div class="card-footer">
                                                <h6>Panier moyen</h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-panier-semaine" role="tabpanel" aria-labelledby="custom-tabs-panier-semaine">
                        <div class="container">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Semaine <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                            <div class="row pt-2">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="panierLineChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <h6>Panier moyen</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-panier-mois" role="tabpanel" aria-labelledby="custom-tabs-panier-mois">
                        <p>Le mois
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                        </p>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-panier-annee" role="tabpanel" aria-labelledby="custom-tabs-panier-annee">
                        <p>L'annee
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                        </p>
                     </div>
                  </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
               Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
               <div class="container">
                    <div class="row">
                          <div class="col-md-4 col-sm-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="card-title">Nouveaux clients</h5>
                                    </div>
                                    <div class="card-body">
                                        <span class="text-primary font-weight-bold text-lg-center" style="font-size: 2rem">678</span> <span style="font-size: 1rem; float: right;" class="text-danger text-sm-right">(-16%)</span>
                                    </div>
                                    <div class="card-footer">
                                        <span class="text-primary" style="font-size: 0.6rem">Nouveaux client sur les 30 derniers jours</span>
                                    </div>
                                </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-title">Total Clients actifs</h5>
                                </div>
                                <div class="card-body">
                                    <span class="text-primary font-weight-bold text-lg-center" style="font-size: 2rem">8690</span> <span style="font-size: 1rem; float: right;" class="text-primary text-sm-right">(+8%)</span>
                                </div>
                                <div class="card-footer">
                                    <span class="text-primary" style="font-size: 0.6rem">De vos clients ont effectué au moins un achat lors des derniers 60 jours</span>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="card-title">Clients inactifs</h5>
                            </div>
                            <div class="card-body">
                                <span class="text-primary font-weight-bold text-lg-center" style="font-size: 2rem">416</span> <span style="font-size: 1rem; float: right;" class="text-primary text-sm-right">(+8%)</span>
                            </div>
                            <div class="card-footer">
                                <span class="text-primary"> De vos clients n’ont effectué aucun achat depuis 60 jours</span>
                            </div>
                        </div>
                  </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-success">
                                <div class="card-header">
                                  <h3 class="card-title">Pyramide des âges</h3>
                                </div>
                                <div class="card-body">
                                  <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                  <h3 class="card-title">Donut Chart</h3>

                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                      <i class="fas fa-times"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                              </div>
                        </div>
                    </div>
               </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="row mb-2">

      </div>
  </div>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>


  <script>
      var areaChartData = {
      labels  : ['8h', '9h', '10h', '11h', '12h', '13h', '14h','15h','16h','17h','18h','19h','20h'],
      datasets: [
        {
          label               : 'Aujourd\'hui',
          backgroundColor     : '#44811c',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Moyenne glissante sur 30 jours',
          backgroundColor     : '#246bb4',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40,64,37,49,58,42,81]
        },
      ]
    }

    var chartData = {
      labels  : ['8h', '9h', '10h', '11h', '12h', '13h', '14h','15h'],
      datasets: [
        {
          label               : 'Aujourd\'hui',
          backgroundColor     : '#f8ba00',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [5, 8, 4, 7.2, 8, 7, 8, 2.4]
        },
        {
          label               : 'Moyenne glissante sur 30 jours',
          backgroundColor     : '#ff9300',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [6.1, 2.8, 8.6, 5, 5.8, 5, 4,6]
        },
      ]
    }


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


    var barCanvas = $('#barChart2').get(0).getContext('2d')
    var barData = $.extend(true, {}, chartData)
    var temp10 = chartData.datasets[0]
    var temp11 = chartData.datasets[1]
    barData.datasets[0] = temp11
    barData.datasets[1] = temp10

    var barOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barCanvas, {
      type: 'bar',
      data: barData,
      options: barOptions
    })


    // Panier moyen
    var panierLineChartData = {
      labels  : ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
      datasets: [
        {
          label               : 'Cette semaine',
          backgroundColor     : '#44811c',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [18000, 48000, 54000, 23000, 56000, 27000,49000]
        },
        {
          label               : 'Moyenne glissante sur 30 jours',
          backgroundColor     : '#39759c',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [25000, 59000, 42000, 30000, 46000, 55000]
        },
      ]
    }
    var panierLineChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }
    var lineChartCanvas = $('#panierLineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, panierLineChartOptions)
    var lineChartData = $.extend(true, {}, panierLineChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'moins de 1 achat par mois',
          'entre 1 a 2 achats par mois',
          'plus de 2 achats par mois'
      ],
      datasets: [
        {
          data: [47,39,14],
          backgroundColor : ['#ff2600', '#61d836', '#246bb4'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var pyramideData = {
      labels  : ['<21ans','21 à 35ans', '36 à 45ans', '46 à 55ans', '>55ans'],
      datasets: [
        {
          label               : 'Homme',
          backgroundColor     : '#56c1ff',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [35, 89, 40, 72, 68]
        },
        {
          label               : 'Femme',
          backgroundColor     : '#ff95ca',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [56, 61, 37, 85, 45]
        },
      ]
    }

    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, pyramideData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  </script>
@endsection
