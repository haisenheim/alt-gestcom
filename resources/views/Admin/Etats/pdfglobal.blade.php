
@extends('layouts.admin')

@section('content')
  <div class="container">
        <h3 class="text-center">ETAT GLOBAL</h3>
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">PAIEMENTS CLIENTS</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>MOIS</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0; ?>
                        @foreach ($cdata as $k=>$v)
                            <?php $s = $s+$v ?>
                            <tr>
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
                <h5 class="text-center">PAIEMENTS FOURNISSEURS</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>MOIS</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0; ?>
                        @foreach ($fdata as $k=>$v)
                            <?php $s = $s+$v ?>
                            <tr>
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
                <h5 class="text-center">DEPENSES</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>MOIS</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0; ?>
                        @foreach ($depdata as $k=>$v)
                            <?php $s = $s+$v ?>
                            <tr>
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
                <h5 class="text-center">COMMISSIONS VERSEES</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>MOIS</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0; ?>
                        @foreach ($comdata as $k=>$v)
                            <?php $s = $s+$v ?>
                            <tr>
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
                        <tr>
                            <th>MOIS</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0; ?>
                        @foreach ($sdata as $k=>$v)
                            <?php $s = $s+$v ?>
                            <tr>
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
                <h4 class="text-center">ETAT GLOBAL</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
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
                            <tr>
                                <th>{{ $k }}</th>
                                <td>{{ number_format($v['e'],0,',','.') }}</td>
                                <td>{{ number_format($v['s'],0,',','.') }}</td>
                                <td>{{ number_format($v['p'],0,',','.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
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

@endsection
