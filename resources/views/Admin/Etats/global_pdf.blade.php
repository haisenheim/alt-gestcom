<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.style')
    <title>Journal des paiements</title>
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
        <div class="">
            <h3 class="text-center">ETAT GLOBAL</h3>
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">PAIEMENTS CLIENTS</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px">
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s = 0; ?>
                            @foreach ($cdata as $k=>$v)
                                <?php $s = $s+$v ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v,0,',','.') }}</td>
                                </tr>
                            @endforeach
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right">TOTAL</td>
                                    <th>{{ number_format($s,0,',','.') }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">PAIEMENTS FOURNISSEURS</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s = 0; ?>
                            @foreach ($fdata as $k=>$v)
                                <?php $s = $s+$v ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v,0,',','.') }}</td>
                                </tr>
                            @endforeach
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right">TOTAL</td>
                                    <th>{{ number_format($s,0,',','.') }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">DEPENSES</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s = 0; ?>
                            @foreach ($depdata as $k=>$v)
                                <?php $s = $s+$v ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v,0,',','.') }}</td>
                                </tr>
                            @endforeach
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right">TOTAL</td>
                                    <th>{{ number_format($s,0,',','.') }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">COMMISSIONS VERSEES</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s = 0; ?>
                            @foreach ($comdata as $k=>$v)
                                <?php $s = $s+$v ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v,0,',','.') }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td style="text-align: right">TOTAL</td>
                                    <th>{{ number_format($s,0,',','.') }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">ETAT GLOBAL DES SORTIES </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s = 0; ?>
                            @foreach ($sdata as $k=>$v)
                                <?php $s = $s+$v ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v,0,',','.') }}</td>
                                </tr>
                            @endforeach
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right">TOTAL</td>
                                    <th>{{ number_format($s,0,',','.') }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">ETAT GLOBAL</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th>MOIS</th>
                                <th>ENTREE</th>
                                <th>SORTIE</th>
                                <th>PROFIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $se =0; $ss=0; $sp=0; ?>
                            @foreach ($data as $k=>$v)
                                <?php $se=$se+$v['e']; $ss= $ss + $v['s']; $sp = $sp + $v['p']; ?>
                                <tr style="font-size: 11px;">
                                    <th>{{ $k }}</th>
                                    <td>{{ number_format($v['e'],0,',','.') }}</td>
                                    <td>{{ number_format($v['s'],0,',','.') }}</td>
                                    <td>{{ number_format($v['p'],0,',','.') }}</td>
                                </tr>
                            @endforeach
                            <tr style="font-size: 12px;">
                                <td style="text-align: right">TOTAL</td>
                                <th>{{ number_format($se,0,',','.') }}</th>
                                <th>{{ number_format($ss,0,',','.') }}</th>
                                <th>{{ number_format($sp,0,',','.') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
      </div>
    </main>
</body>
</html>


