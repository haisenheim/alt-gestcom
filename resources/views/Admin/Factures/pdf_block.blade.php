<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.style')
    <title>Historique factures</title>
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

        table.table{
            font-size: 12px;
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
        <h5>HISTORIQUES DES FACTURES</h5>
        <div style="margin-top:30px;" class="">
            <span style="font-size: 13px;"> <span>CLIENT : </span><strong>{{ $client->name }}</strong></span>
            <address>
              <span style="font-size: 11px;">Adresse : {{ $client->adresse }}</span><br>

             <span style="font-size: 12px;"> Téléphone: {{ $client->telephone }}</span><br>
              <span style="font-size: 11px;">Email: {{ $client->email }}</span>

            </address>
        </div>
        <table class="table table-bordered table-sm table-hover">
            <thead>
                  <tr>
                        <th>DATE</th>
                        <th>REFERENCE</th>
                        <th>CLIENT</th>
                        <th>MONTANT</th>
                        <th>VERSEMENT</th>
                        <th>RESTE</th>
                        <th>STATUT</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($factures as $fournisseur)
                    <tr>
                        <td>{{ date_format($fournisseur->created_at,'d/m/Y H:i') }}</td>
                        <td>{{ $fournisseur->reference }}</td>
                        <td>{{ $fournisseur->client?$fournisseur->client->name:$fournisseur->client_name }}</td>
                        <td>{{ number_format($fournisseur->montant,0,',','.') }}</td>
                        <td>{{ number_format($fournisseur->versement,0,',','.') }}</td>
                        <td>{{ number_format($fournisseur->reste,0,',','.') }}</td>
                        <td>{{ $fournisseur->status['name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>


