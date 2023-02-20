
@extends('layouts.marchand')


@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-sm-12">
              <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <div class="card bg-warning elevation-4">
                          <div class="card-body">
                            Points de fidélité
                            distribués
                          </div>
                          <div class="card-footer">
                              <h5>52.390</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 col-sm-12">
              <div class="row">
                  <div class="col-md-offset-3 col-md-6 col-sm-12">
                      <div class="card bg-danger border-info elevation-4">
                          <div class="card-body">
                              Points de fidélité
                                utilisés
                          </div>
                          <div class="card-footer">
                            <h5>12.390</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 col-sm-12">
              <div class="row">
                  <div class="col-md-offset-6 col-md-6 col-sm-12">
                      <div class="card bg-success elevation-4">
                          <div class="card-body">
                              Points de fidélité
                                non utilisés
                          </div>
                          <div class="card-footer">
                              <h5>40.000</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <hr>
      <div class="p-0 pt-1">
        <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-menu" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Récompenses immédiates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Récompenses différées</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-avis" role="tab" aria-controls="custom-tabs-avis" aria-selected="false">Opportunité de vente</a>
          </li>
        </ul>
      </div>
      <div class="">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

              <div class="p-0 pt-1">
                  <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-tous-tab" data-toggle="pill" href="#custom-tabs-tous" role="tab" aria-controls="custom-tabs-tous" aria-selected="true">Tous</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-bienvenu-tab" data-toggle="pill" href="#custom-tabs-bienvenu" role="tab" aria-controls="custom-tabs-bienvenu" aria-selected="false">Offres de bienvenu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-points-tab" data-toggle="pill" href="#custom-tabs-points" role="tab" aria-controls="custom-tabs-points" aria-selected="false">Actions sur les points</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-reduction-tab" data-toggle="pill" href="#custom-tabs-reduction" role="tab" aria-controls="custom-tabs-reduction" aria-selected="false">Bons de réductions</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-tous" role="tabpanel" aria-labelledby="custom-tabs-tous">
                      <div class="container table-responsive">
                              <table class="table table-striped-table-sm-table-hover data-table">
                                  <thead>
                                      <tr style="color: #fff; background:#276893">
                                          <th>Description de la récompense</th>
                                          <th>Validité</th>
                                          <th>Echéance</th>
                                          <th>Nombre de
                                            bénéficiaires</th>
                                            <th>ROI
                                                <span style="font-size: 0.6rem">(vente additionnelle / vente
                                                habituelle)</span>
                                            </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>Réduction immédiate de 5%</td>
                                          <td><a href="#">Tous les mardis: 15h-18h</a></td>
                                          <td><a href="#">30 juin 22</a></td>
                                          <td>4677</td>
                                          <td><a href="#">23%</a></td>
                                      </tr>
                                      <tr>
                                        <td>Réduction immédiate de 5%</td>
                                        <td><a href="#">Tous les mardis: 15h-18h</a></td>
                                        <td><a href="#">30 juin 22</a></td>
                                        <td>4677</td>
                                        <td><a href="#">23%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Réduction immédiate de 5%</td>
                                        <td><a href="#">Tous les mardis: 15h-18h</a></td>
                                        <td><a href="#">30 juin 22</a></td>
                                        <td>4677</td>
                                        <td><a href="#">23%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Réduction immédiate de 5%</td>
                                        <td><a href="#">Tous les mardis: 15h-18h</a></td>
                                        <td><a href="#">30 juin 22</a></td>
                                        <td>4677</td>
                                        <td><a href="#">23%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Réduction immédiate de 5%</td>
                                        <td><a href="#">Tous les mardis: 15h-18h</a></td>
                                        <td><a href="#">30 juin 22</a></td>
                                        <td>4677</td>
                                        <td><a href="#">23%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Tablette de chocolat blanc</td>
                                        <td><a href="#">Chaque jour: 07h-20h</a></td>
                                        <td><a href="#">Deuis toujours</a></td>
                                        <td>33098</td>
                                        <td><a href="#">12%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Pack d'eau mayo</td>
                                        <td><a href="#">Tous les mecredis: 15h-18h</a></td>
                                        <td><a href="#">19 juin 22</a></td>
                                        <td>557</td>
                                        <td><a href="#">45%</a></td>
                                    </tr>
                                  </tbody>
                              </table>
                              <div class="pull-right text-right mb-3">
                                    <button class="btn btn-primary">Créer une récompense</button>
                              </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-bienvenu" role="tabpanel" aria-labelledby="custom-tabs-bienvenu">
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                      </p>
                   </div>
                   <div class="tab-pane fade" id="custom-tabs-points" role="tabpanel" aria-labelledby="custom-tabs-points">
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                      </p>
                   </div>
                   <div class="tab-pane fade" id="custom-tabs-reduction" role="tabpanel" aria-labelledby="custom-tabs-reduction">
                      <p>L'annee
                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          At consequatur ad hic. Ad labore dolorem omnis possimus placeat ducimus consectetur officia totam. Vel modi et ut similique, cupiditate voluptate dignissimos.
                      </p>
                   </div>
                </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

              <div class="p-0 pt-1">
                  <ul style="display: flex; justify-content:flex-start;" class="nav nav-tabs content-submenu" id="custom-tabs-panier-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-lots-tab" data-toggle="pill" href="#custom-tabs-lots" role="tab" aria-controls="custom-tabs-lots" aria-selected="true">Lots</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-tombola-tab" data-toggle="pill" href="#custom-tabs-tombola" role="tab" aria-controls="custom-tabs-tombola" aria-selected="false">Tombola</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="custom-tabs-panier-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-lots" role="tabpanel" aria-labelledby="custom-tabs-lots">
                      <div class="container">
                        <table class="table table-striped-table-sm-table-hover data-table">
                            <thead>
                                <tr style="color: #fff; background:#276893">
                                    <th>Description de la récompense</th>
                                    <th>Valeur absolue (XAF)</th>
                                    <th>Valeur relative</th>

                                    <th>Nombre de points necessaires</th>
                                    <th>ROI
                                        <span style="font-size: 0.8rem">(vente additionnelle / vente habituelle)</span>
                                    </th>
                                    <th>Validité</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Réduction immédiate de 5%</td>
                                    <td><a href="#">5000</a></td>
                                    <td><a href="#">3%</a></td>
                                    <td><a href="#">167</a></td>
                                    <td>23%</td>
                                    <td>31/12/21</td>
                                </tr>
                                <tr>
                                    <td>Réduction immédiate de 5%</td>
                                    <td><a href="#">5000</a></td>
                                    <td><a href="#">3%</a></td>
                                    <td><a href="#">167</a></td>
                                    <td>23%</td>
                                    <td>31/12/21</td>
                                </tr>
                                <tr>
                                    <td>Réduction immédiate de 5%</td>
                                    <td><a href="#">5000</a></td>
                                    <td><a href="#">3%</a></td>
                                    <td><a href="#">167</a></td>
                                    <td>23%</td>
                                    <td>31/12/21</td>
                                </tr>
                                <tr>
                                    <td>Réduction immédiate de 5%</td>
                                    <td><a href="#">5000</a></td>
                                    <td><a href="#">3%</a></td>
                                    <td><a href="#">167</a></td>
                                    <td>23%</td>
                                    <td>31/12/21</td>
                                </tr>
                                <tr>
                                    <td>Réduction immédiate de 5%</td>
                                    <td><a href="#">5000</a></td>
                                    <td><a href="#">3%</a></td>
                                    <td><a href="#">167</a></td>
                                    <td>23%</td>
                                    <td>31/12/21</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="pull-right text-right mb-3">
                            <button class="btn btn-primary">Créer un lot</button>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-tombola" role="tabpanel" aria-labelledby="custom-tabs-tombola">
                      <div class="container">
                        <table class="table table-striped-table-sm-table-hover data-table">
                            <thead>
                                <tr style="color: #fff; background:#276893">
                                    <th>Description de la récompense</th>
                                    <th>Valeur absolue (XAF)</th>
                                    <th>Validité</th>
                                    <th>Valeur d'un ticket de tombola en points</th>

                                    <th>Nombre de tickets distribué</th>
                                    <th>ROI
                                        <span style="font-size: 0.8rem">(vente additionnelle / vente habituelle)</span>
                                    </th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gagnez un séjour pour 2 à Dubai</td>
                                    <td><a href="#">4000 000</a></td>
                                    <td>31/12/21</td>
                                    <td>50</td>
                                    <td>3879</td>
                                    <td>35%</td>
                                    <td>En cours</td>
                                </tr>
                                <tr>
                                    <td>Gagnez la voiture de ses rêves</td>
                                    <td><a href="#">16 000 000</a></td>
                                    <td>31/12/21</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>Programmé</td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="pull-right text-right mb-3">
                            <button class="btn btn-primary">Créer</button>
                        </div>
                      </div>
                   </div>
                </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-avis" role="tabpanel" aria-labelledby="custom-tabs-avis-tab">
              <div class="p-0 pt-1">
                  <ul style="display: flex; justify-content:space-around;" class="nav nav-tabs content-submenu" id="custom-tabs-avis-subtab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-promotion-tab" data-toggle="pill" href="#custom-tabs-promotion" role="tab" aria-controls="custom-tabs-jour" aria-selected="true">Produits en promotion</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-avis-semaine-tab" data-toggle="pill" href="#custom-tabs-avis-semaine" role="tab" aria-controls="custom-tabs-semaine" aria-selected="false">Achats récurrents</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-avis-mois-tab" data-toggle="pill" href="#custom-tabs-avis-mois" role="tab" aria-controls="custom-tabs-avis-mois" aria-selected="false">Nouveau produits</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-avis-annee-tab" data-toggle="pill" href="#custom-tabs-avis-annee" role="tab" aria-controls="custom-tabs-avis-annee" aria-selected="false">Anniversaires</a>
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
                      
                      <div style="" class="pt-3 mt-3">

                            <table class="table table-bordered table-sm">
                                <thead style="background: #0076ba; color:#fff">
                                    <tr>
                                        <th rowspan="2" style="line-height: 5rem">Produits</th>
                                        <th colspan="2" rowspan="1">Nombre de clients potentiel <br>
                                           <span style="font-size: 0.7rem">Client fêtant leur anniversaire aujourd’hui</span>
                                        </th>
                                        <th rowspan="2" style="line-height: 5rem">Nombre de vente</th>
                                        <th rowspan="2" style="line-height: 5rem">Taux de conversion</th>
                                    </tr>
                                    <tr>
                                        <th>Entre 1 et 2 achats/mois</th>
                                        <th>Plus de 2 achats/mois</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bon de réduction de 10%</td>
                                        <td><a href="">12</a></td>
                                        <td></td>
                                        <td><a href="">8</a></td>
                                        <td><a href="">67%</a></td>
                                    </tr>
                                    <tr>
                                        <td>Bon d’achat de 20.000 F</td>
                                        <td></td>
                                        <td><a href="">8</a></td>
                                        <td><a href="">6</a></td>
                                        <td><a href="">75%</a></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="pull-right text-right mb-3">
                                <button class="btn btn-primary pl-3 pr-3">Créer</button>
                            </div>
                          {{-- <button class="btn btn-primary btn-block btn-sm" style="border-radius: 1rem">Avis</button>
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
                          </div> --}}
                      </div>
                   </div>
                </div>

          </div>
      </div>
  </div>
@endsection
