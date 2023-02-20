
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
              <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-avis" role="tab" aria-controls="custom-tabs-avis" aria-selected="false">Avis & Notation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Segmentation</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-fichier-tab" data-toggle="pill" href="#custom-tabs-fichier" role="tab" aria-controls="custom-tabs-fichier" aria-selected="false">Fichier client</a>
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
            <div class="tab-pane fade" id="custom-tabs-avis" role="tabpanel" aria-labelledby="custom-tabs-avis-tab">
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
                        <div class="container">
                            <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Ajourd'hui <span style="float: right"><i class="far fa-calendar-alt"></i></span></button>
                            <div class="pt-2">
                                <div class="chart">
                                  <canvas id="avisJourStackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
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
                                <span class="text-primary" style="font-size: 0.6rem"> De vos clients n’ont effectué aucun achat depuis 60 jours</span>
                            </div>
                        </div>
                  </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="">
                                <h6 class="text-center">Pyramide des âges</h6>
                                <div class="">
                                  <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="">
                                <h6 class="text-center"></h6>
                                <div class="">
                                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                              </div>
                        </div>
                    </div>
               </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-fichier" role="tabpanel" aria-labelledby="custom-tabs-fichier-tab">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <table class="table table-hover table-sm data-table">
                                <thead>
                                      <tr>
                                          <th></th>
                                          <th>Ref.</th>
                                          <th>Client</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>OdileX</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>AbdelY</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>DavidZ</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Clement E</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Jesus B</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Blessing E</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="container">
                                <div style="min-height: 40vh" class="card bg-light">
                            </div>

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
@include('includes.data-table')
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
      plugins:{
          title:{
              display:true,
              text:'Pyramide des ages'
          },
      },
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
    });

    //Avis et Notation

    var jourAvisData = {
      labels  : ['8h','9h', '10h', '11h', '12h','13h','14h','15h','16h','17h','18h','19h','20h'],
      datasets: [
        {
          label               : '1/5',
          backgroundColor     : '#de1312',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [3, 9, 4, 7, 6,3,4,5,3,8,1,2,1]
        },
        {
          label               : '2/5',
          backgroundColor     : '#ff8213',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [2, 3, 1, 2, 2,4,1,0,7,3,4,3,2]
        },
        {
          label               : '3/5',
          backgroundColor     : '#ffb726',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [1, 4, 3, 2, 2,4,1,2,3,5,3,1,2]
        },
        {
          label               : '4/5',
          backgroundColor     : '#99f529',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [3, 3, 2, 1, 1,1,4,2,0,2,1,2,1]
        },
        {
          label               : '5/5',
          backgroundColor     : '#0ad2ff',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [1, 2, 4, 3, 2,1,5,2,3,6,2,2,5]
        },
      ]
    }

    var jourStackedBarChartCanvas = $('#avisJourStackedBarChart').get(0).getContext('2d')
    var jourStackedBarChartData = $.extend(true, {}, jourAvisData)

    var jourStackedBarChartOptions = {
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

    new Chart(jourStackedBarChartCanvas, {
      type: 'bar',
      data: jourStackedBarChartData,
      options: jourStackedBarChartOptions
    });

    // Avis par semaine
    var semaineAvisData = {
      labels  : ['Lundi','Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche'],
      datasets: [
        {
          label               : '1/5',
          backgroundColor     : '#de1312',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [16,13,14,15,23,18,21]
        },
        {
          label               : '2/5',
          backgroundColor     : '#ff8213',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [12, 23, 11, 22, 12,14,22]
        },
        {
          label               : '3/5',
          backgroundColor     : '#ffb726',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [14,21,12,23,35,23,11]
        },
        {
          label               : '4/5',
          backgroundColor     : '#99f529',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [13, 23, 22, 21, 11,21,14]
        },
        {
          label               : '5/5',
          backgroundColor     : '#0ad2ff',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [12,15,22,23,16,12,22]
        },
      ]
    }

    var semaineStackedBarChartCanvas = $('#avisSemaineStackedBarChart').get(0).getContext('2d')
    var semaineStackedBarChartData = $.extend(true, {}, semaineAvisData)

    var semaineStackedBarChartOptions = {
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

    new Chart(semaineStackedBarChartCanvas, {
      type: 'bar',
      data: semaineStackedBarChartData,
      options: semaineStackedBarChartOptions
    });

    // Avis du mois

    var anneeAvisData = {
      labels  : ['Janvier','Fevrier', 'Mars', 'Avril', 'Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
      datasets: [
        {
          label               : '1/5',
          backgroundColor     : '#de1312',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [33, 29, 24, 17, 26,23,14,25,33,18,31,12]
        },
        {
          label               : '2/5',
          backgroundColor     : '#ff8213',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [32, 23, 11, 32, 22,14,31,30,27,33,24,23]
        },
        {
          label               : '3/5',
          backgroundColor     : '#ffb726',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [31, 34, 33, 22, 32,24,31,32,23,35,23,31]
        },
        {
          label               : '4/5',
          backgroundColor     : '#99f529',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [23, 13, 32, 21,31,34,22,33,32,21,23,31]
        },
        {
          label               : '5/5',
          backgroundColor     : '#0ad2ff',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [22, 34, 33, 32,21,35,22,33,26,32,22,35]
        },
      ]
    }

    var anneeStackedBarChartCanvas = $('#avisAnneeStackedBarChart').get(0).getContext('2d')
    var anneeStackedBarChartData = $.extend(true, {}, anneeAvisData)



    new Chart(anneeStackedBarChartCanvas, {
      type: 'bar',
      data: anneeStackedBarChartData,
      options: jourStackedBarChartOptions
    });

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
