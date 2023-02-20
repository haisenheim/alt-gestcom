
@extends('layouts.marchand')


@section('content')
  <div class="container-fluid">
    <div class="">
        <div class="p-0 pt-1">
          <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-menu" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tab1-tab" data-toggle="pill" href="#custom-tab1" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tendances</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tab2-tab" data-toggle="pill" href="#custom-tab2" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Méthode d’achat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tab3-tab" data-toggle="pill" href="#custom-tab3" role="tab" aria-controls="custom-tabs-avis" aria-selected="false">Clients par Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tab4-tab" data-toggle="pill" href="#custom-tab4" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Vente par employé</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-tab5-tab" data-toggle="pill" href="#custom-tab5" role="tab" aria-controls="custom-tabs-fichier" aria-selected="false">Points de fidélité</a>
              </li>
          </ul>
        </div>
        <div class="">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tab1" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="chart">
                                                    <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                                  </div>
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
            <div class="tab-pane fade" id="custom-tab2" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

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
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    

                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id = "container_achat" style = "width: 550px; height: 400px; margin: 0 auto"></div>
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
            <div class="tab-pane fade" id="custom-tab3" role="tabpanel" aria-labelledby="custom-tabs-avis-tab">
                <div class="p-0 pt-1">
                    <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-avis-subtab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-avis-jour-tab" data-toggle="pill" href="#custom-tabs-avis-jour" role="tab" aria-controls="custom-tabs-jour" aria-selected="true">Le jour</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-semaine-tab" data-toggle="pill" href="#custom-tabs-avis-semaine" role="tab" aria-controls="custom-tabs-semaine" aria-selected="false">La semaine</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-mois-tab" data-toggle="pill" href="#custom-tabs-avis-mois" role="tab" aria-controls="custom-tabs-avis-mois" aria-selected="false">Le mois</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-annee-tab" data-toggle="pill" href="#custom-tabs-avis-annee" role="tab" aria-controls="custom-tabs-avis-annee" aria-selected="false">L'année</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="custom-tabs-avis-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-avis-jour" role="tabpanel" aria-labelledby="custom-tabs-avis-jour">
                        <div class="container p-3 m-3 mt-0" style="max-height: 600px; max-width:600px;">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Ajourd'hui <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                            <div class="pt-2">
                                <div class="container" style="overflow-y:scroll">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>ARTICLE</th>
                                                <th>NOMBRE DE CLIENTS</th>
                                                <th>TAUX DE CROISSANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-avis-semaine" role="tabpanel" aria-labelledby="custom-tabs-avis-semaine">
                        <div class="container">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Semaine 6 <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                            <div class="pt-2">
                                <div class="chart">
                                  <canvas id="avisSemaineStackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div style="" class="pt-3 mt-3">
                                <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Avis</button>
                                <div class="pt-2 table-responsive">
                                    <table class="table text-primary table-striped table-sm table-hover data-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                                <td>26/06/21</td>
                                            </tr>
                                            <tr>
                                                <td>Charcuterie pas fraiche</td>
                                                <td>23/05/10</td>
                                            </tr>
                                            <tr>
                                                <td>Id adipisci obcaecati facere nihil fugit dignissimos, commodi eaque! Quisquam praesentium alias maxime fugiat officiis, officia sequi dolore? Officia consequatur sint ratione.</td>
                                                <td>03/07/21</td>
                                            </tr>
                                            <tr>
                                                <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                                <td>26/06/21</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-avis-mois" role="tabpanel" aria-labelledby="custom-tabs-avis-mois">
                        <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Juillet <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                        <div class="pt-2">
                            <div class="chart">
                              <canvas id="avisMoisStackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div style="" class="pt-3 mt-3">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Avis</button>
                            <div class="pt-2 table-responsive">
                                <table class="table text-primary table-striped table-sm table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                            <td>26/06/21</td>
                                        </tr>
                                        <tr>
                                            <td>Charcuterie pas fraiche</td>
                                            <td>23/05/10</td>
                                        </tr>
                                        <tr>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci obcaecati facere nihil fugit dignissimos, commodi eaque! Quisquam praesentium alias maxime fugiat officiis, officia sequi dolore? Officia consequatur sint ratione.</td>
                                            <td>26/06/21</td>
                                        </tr>
                                        <tr>
                                            <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                            <td>26/06/21</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-avis-annee" role="tabpanel" aria-labelledby="custom-tabs-avis-annee">
                        <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">2021 <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                        <div class="pt-2">
                            <div class="chart">
                              <canvas id="avisAnneeStackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div style="" class="pt-3 mt-3">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Avis</button>
                            <div class="pt-2 table-responsive">
                                <table class="table text-primary table-striped table-sm table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                            <td>26/06/21</td>
                                        </tr>
                                        <tr>
                                            <td>Charcuterie pas fraiche</td>
                                            <td>23/05/10</td>
                                        </tr>
                                        <tr>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci obcaecati facere nihil fugit dignissimos, commodi eaque! Quisquam praesentium alias maxime fugiat officiis, officia sequi dolore? Officia consequatur sint ratione.</td>
                                            <td>26/06/21</td>
                                        </tr>
                                        <tr>
                                            <td>Les vendeurs de pizza ne respecte pas l’ordre d’arrivé. Même pour acheter il faut avoir un parent?!</td>
                                            <td>26/06/21</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>
                  </div>

            </div>
            <div class="tab-pane fade" id="custom-tab4" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                <div class="p-0 pt-1">
                    <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-avis-subtab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-avis-jour-tab" data-toggle="pill" href="#custom-tabs-avis-jour" role="tab" aria-controls="custom-tabs-jour" aria-selected="true">Le jour</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-semaine-tab" data-toggle="pill" href="#custom-tabs-avis-semaine" role="tab" aria-controls="custom-tabs-semaine" aria-selected="false">La semaine</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-mois-tab" data-toggle="pill" href="#custom-tabs-avis-mois" role="tab" aria-controls="custom-tabs-avis-mois" aria-selected="false">Le mois</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-avis-annee-tab" data-toggle="pill" href="#custom-tabs-avis-annee" role="tab" aria-controls="custom-tabs-avis-annee" aria-selected="false">L'année</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="custom-tabs-avis-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-avis-jour" role="tabpanel" aria-labelledby="custom-tabs-avis-jour">
                        <div class="container p-3 m-3 mt-0">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 col-sm-12">
                                    <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Ajourd'hui <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                                    <div class="pt-2">
                                        <div class="container">
                                            <div>
                                                <div id = "vpemp" style="width: auto; height:auto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-avis-semaine" role="tabpanel" aria-labelledby="custom-tabs-avis-semaine">
                        <div class="container">
                           
                        </div>
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-avis-mois" role="tabpanel" aria-labelledby="custom-tabs-avis-mois">
                        <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Juillet <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                        
                     </div>
                     <div class="tab-pane fade" id="custom-tabs-avis-annee" role="tabpanel" aria-labelledby="custom-tabs-avis-annee">
                        <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">2021 <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                        
                     </div>
                  </div>
                 
            </div>
            <div class="tab-pane fade" id="custom-tab5" role="tabpanel" aria-labelledby="custom-tabs-fichier-tab">

                    <div class="">
                        GESTION DES POINTS DE FIDELITE
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
<script src="{{asset('js/canvasjs.min.js')}}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@include('includes.data-table')
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>


  <script>

google.charts.load("visualization", "1", { packages: ["corechart"] });

function drawChartvp() {
            // Define the chart to be drawn.
            var datavp = google.visualization.arrayToDataTable([
                ['Employe', 'Vente de la période', 'Vente de la période précédente'],
               ['Pierrette',  60,      90],
               ['Audrey',  80,      40],
               ['Sylvain',  70,      60],
               ['Denis',  50,       90],
               
            ]);

            var options = {title: 'En milliers de francs CFA'}; 

            // Instantiate and draw the chart.
            var chartvp = new google.visualization.BarChart(document.getElementById('vpemp'));
            chartvp.draw(datavp, options);
         }
         google.charts.setOnLoadCallback(drawChartvp);

function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Paiement');
            data.addColumn('number', 'Percentage');
            data.addRows([
               ['Espèces', 39.0],
               ['Airtel Money', 11.0],
               ['Bon d\'achat', 3.0],
               ['Cartes', 32.0],
               ['MTN MoMo', 12.0],
               ['Bon de réduction', 2.0]
            ]);
               
            // Set chart options
            var options = {
               'title':'Méthode de paiement',
               'width':550,
               'height':400,
               pieHole: 0.6,
               is3D:true,
               slices: {  
                1: {offset: 0.2},
                3: {offset: 0.3}                  
                }
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('container'));
            chart.draw(data, options);
         }

function drawChartAchat() {
            // Define the chart to be drawn.
            var a_data = new google.visualization.DataTable();
            a_data.addColumn('string', 'Achat');
            a_data.addColumn('number', 'Percentage');
            a_data.addRows([
               ['Courses', 27],
               ['Drive', 14],
               ['Livraison', 59],
            ]);
               
            // Set chart options
            var a_options = {
               'title':'Méthode d\'achat',
               'width':550,
               'height':400,
               pieHole: 0.6,
              
            };

            // Instantiate and draw the chart.
            var chart_achat = new google.visualization.PieChart(document.getElementById('container_achat'));
            chart_achat.draw(a_data, a_options);
         }
         google.charts.setOnLoadCallback(drawChart);
         google.charts.setOnLoadCallback(drawChartAchat);

    

      var areaChartData = {
      labels  : ['8h', '9h', '10h', '11h', '12h', '13h', '14h','15h','16h','17h','18h','19h','20h'],
      datasets: [
        {
          label               : 'Aujourd\'hui',
          backgroundColor     : '#dc3545',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#dc3545',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28000, 480000, 540000, 190000, 86000, 270000, 90000,467000,276000]
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
          data                : [500000, 390000, 480000, 181000, 456000, 550000, 400000,64000,370000,490000,580000,420000,81000]
        },
      ]
    }

    var chartData = {
      labels  : ['8h', '9h', '10h', '11h', '12h', '13h', '14h','15h'],
      datasets: [
        {
          label               : 'Aujourd\'hui',
          backgroundColor     : '#dc3545',
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





    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    


    //---Avis ----

    /* $(".data-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); */
    $('.data-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  </script>
@endsection
