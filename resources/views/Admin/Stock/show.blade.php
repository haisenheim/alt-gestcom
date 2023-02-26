@extends('layouts.admin')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div id="invoice" class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <small class="float-right">Date: {{ $facture->created_at?date_format($facture->created_at,'d/m/Y'):'-' }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                @if ($facture->client)
                <div class="col-sm-4 invoice-col">
                    FOURNISSEUR:
                    <address>
                      <strong>{{ $facture->fournisseur->name }} </strong><br>
                      {{ $facture->fournisseur->adresse }}<br>

                      Téléphone: {{ $facture->fournisseur->telephone }}<br>
                      Email: {{ $facture->fournisseur->email }}<br/>

                    </address>
                </div>
                @else
                <div class="col-sm-4 invoice-col">
                    CLIENT:
                    <address>
                      <strong>{{ $facture->client_name }} </strong><br>
                    </address>
                </div>
                @endif
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant, 0,',','.') }} </b><br>
                  <br>

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>

                                <th>DESIGNATION</th>
                                <th>PU</th>
                                <th>QUANTITE</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($facture->appros as $ligne)
                                    <tr>
                                       <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                       <td>{{ number_format($ligne->pa,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->quantite,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->montant,0,',','.') }}</td>
                                    </tr>

                            @endforeach

                            <tr>
                                <th style="text-align: right;" colspan="3">TOTAL HT</th>
                                <th style="text-align: left;">{{ number_format($facture->montant,0,',','.') }}</th>
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


