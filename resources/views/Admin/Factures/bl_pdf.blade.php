<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.style')
    <title>{{ $facture->reference }}</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -90px;
            left: 0px;
            right: 0px;
            border-bottom: #000 solid 1px;
            padding-bottom: 90px;
            /** Extra personal styles **/
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/

            text-align: center;
            border-top: #000 solid 1px;
            padding-top: 5px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <header>
        <div style="">
            <div style="">
                <div class="">
                    <div class="" style="height: 100px; float:left">
                        <img style="border:none;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" class="image img-thumbnail" height="80px" width="80px" />
                    </div>
                    <div class="col-sm-10" style="padding-left:20px; float: left;text-align:center;">
                        <p style="margin: 0;font-size:18px;font-weight: 900; color:#777">ETS CHRISTEVIE</p>
                        <p style="margin: 0;font-size:14px; font-weight: 600">FROID GENERAL & VENTE EQUIPEMENTS - ACCESSOIRES</p>
                        <p style="margin: 0;font-size:12px;">Adresse : Mahouata - Avenue MOE PRATT</p>
                        <p style="margin: 0; font-size:12px;">TELEPHONE: +242 06 631 32 11 - Email : nonochristevie@gmail.com </p>
                    </div>
                </div>
            </div>
      </div>
    </header>

    <footer>
        <div style="font-size: 11px">
             <p style="margin:0"><span>Ets. CHRISTEVIE - RCCM:CG/PNR/12 A 456 - Compte N<sup>o</sup> 32002669011 BGFI BANK - TEL:+242066313211</span></p>
            <p style="margin:0"><span> NIU:P2019110006440206</span></p>
            <p style="margin:0"><span>POINTE-NOIRE / REPUBLIQUE DU CONGO</span></p>
        </div>
        <div style="margin-top:20px; padding: 3px 10px; background-color: #555; color:#fff; font-size: 8px;">
            <span>Éditée sur ALT GESTCOM By Alliages Technologies - Editeur de systèmes de gestion +242 064576186 whatsapp:+242 055973621</span>
        </div>
    </footer>
    <main style="margin-top:10px;">
        <?php
            $tva = $facture->total * 0.18;
            $ca = $tva * 0.05;
            $net = $facture->total + $tva + $ca;
            ?>
        <div class="">
            <!-- Main content -->
            <div  class="p-3 mb-3">
              <!-- info row -->
              <h2 style="margin: 0; font-size:22px;">BON DE LIVRAISON N<sup>o</sup> {{ $facture->id }}{{ date_format($facture->created_at,'dmyh') }}</h2>
              <h5 style="margin: 0; font-size:16px;">FACTURE N<sup>o</sup> {{ $facture->reference }}</h5>
              <!-- info row -->
              <div style="height: 120px;" class="mt-2">

                @if ($facture->client)
                <div style="float: left; width: 50%" class="">
                    <span style="font-size: 13px;"> <span>CLIENT : </span><strong>{{ $facture->client->name }}</strong></span>
                    <address>
                      <span style="font-size: 11px;">Adresse : {{ $facture->client->adresse }}</span><br>

                     <span style="font-size: 12px;"> Téléphone: {{ $facture->client->telephone }}</span><br>
                      <span style="font-size: 11px;">Email: {{ $facture->client->email }}</span>

                    </address>
                </div>
                @else
                <div style="float: left;" class="">
                   <span style="font-size: 14px;"> <span>CLIENT : </span><strong>{{ $facture->client_name }} </strong></span>
                </div>
                @endif
                <!-- /.col -->


                <!-- /.col -->
                <div style="float: left; font-size: 11px; font-weight: 600; width: 40%; text-align: right" class="col-sm-6 invoice-col">
                    <span style="float:left;">DATE DE CREATION : {{ date_format($facture->created_at,'d/m/Y') }}</span>
                    <div class="mt-3">
                        <p style="float:left; font-size: 11px;font-weight: 600;">DELAI DE PAIEMENT : {{ $facture->delai?$facture->delai->name .' jours':'Paiement immediat' }}</p>
                    </div>
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="">
                <div class="table-responsive col-md-12 col-sm-12">
                    <table style="font-size:12px;" class="table table-bordered table-sm">
                        <thead>
                            <tr>

                                <th>DESIGNATION</th>
                                <th>PU</th>
                                <th>QUANTITE</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($facture->lignes as $ligne)
                                    <tr>
                                       <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                       <td>{{ number_format($ligne->pu,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->quantite,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->montant,0,',','.') }}</td>
                                    </tr>
                            @endforeach
                            @if($facture->with_tva)
                                <tr>
                                    <th style="text-align: right;" colspan="3">MONTANT HT</th>
                                    <th style="text-align: left;">{{ number_format($facture->total,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;" colspan="3">TVA (18%)</th>
                                    <th style="text-align: left;">{{ number_format($facture->tva,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right" colspan="3">CA</th>
                                    <th style="text-align: left;">{{ number_format($facture->ca,0,',','.') }}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: right;" colspan="3">NET A PAYER</th>
                                    <th style="text-align: left;">{{ number_format($facture->montant,0,',','.') }}</th>
                                </tr>
                            @else
                            <tr>
                                <th style="text-align: right;" colspan="3">TOTAL HT</th>
                                <th style="text-align: left;">{{ number_format($facture->montant,0,',','.') }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
                <div style="margin-top: 30px; height:160px; width:400px; border:#555 2px;">
                    <h5>SIGNATURE DU CLIENT </h5>
                </div>

              </div>

            <!-- /.invoice -->
        </div>
    </main>
</body>
</html>


