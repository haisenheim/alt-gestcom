@extends('layouts.marchand')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>

                    <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                  </h4>
                  <ul id="float-menu" style="position: fixed;" class="list-inline">

                       <li class="list-inline-item">
                            <a  title="Imprimer" class="ripple" href="#"><i class="fa fa-print fa-lg text-info"></i></a>
                       </li>
                  </ul>

                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  FOURNISSEUR :
                  <address>
                    <strong>NYOTA SARL </strong><br>
                    PLACE DE LA BOURSE DU TRAVAIL, Pointe-Noire<br>

                    Téléphone: +242 055287786<br>
                    Email: contact@nyota-app.com<br/>

                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant*(1+18.9/100), 0,',','.') }} </b><br>
                  <br>

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>MOIS : {{ $facture->moi->name .' '.$facture->annee }} </b><br>
                    <br>

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                   <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>INTERVALLE</th>
                                <th>QUANTITE</th>
                                <th>PU</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; $tcartes =0;  //dd($facture->details['count']); ?>
                            @foreach($facture->details['count'] as $k=>$v)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $v['min'] }} - {{ $v['max'] }}</td>
                                        <td>{{ number_format($v['quantity'],0,',','.') }}</td>
                                        <td>{{ number_format($k,0,',','.') }}</td>
                                        <th>{{ number_format($v['quantity'] * $k,0,',','.') }}</th>
                                    </tr>
                                    <?php $tcartes = $tcartes + $v['quantity'] ?>
                            @endforeach
                            <tr>
                                <td style="text-align: right;" colspan="2">TOTAL CARTES</td>
                                <th>{{ $tcartes }}</th>
                                <td style="text-align: right;">TOTAL HT</td>
                                <th>{{ number_format($facture->montant,0,',','.') }}</th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td style="text-align: right;">TVA</td>
                                <th>{{ number_format($facture->montant *18/100,0,',','.') }}</th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td style="text-align: right;">CA</td>
                                <th>{{ number_format($facture->montant *0.9/100,0,',','.') }}</th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td style="text-align: right;">TOTAL TTC</td>
                                <th>{{ number_format($facture->montant *(1+18.9/100),0,',','.') }}</th>
                            </tr>
                        </tbody>
                   </table>
                </div>
              </div>

            <!-- /.invoice -->

        </div>
    </div>
    </div>
    <style>
        div.content{
            background-color: #eeeeee;
        }
    </style>
@endsection


