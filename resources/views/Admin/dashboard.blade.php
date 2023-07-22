
@extends('layouts.admin')


@section('content')
<script src="{{ asset('js/chart.min.js') }}"></script>
  <div class="container p-3">
        <h4>TABLEAU DE BORD</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-teal">
                    <div class="card-header">
                        <h3 class="card-title">TOUS LES PAIEMENTS CLIENTS</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['all_paiements'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-header">
                        <h3 class="card-title">PAIEMENTS CLIENTS SUR LE CHIFFRE D'AFFAIRE</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['paiements'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-danger">
                    <div class="card-header">
                        <h3 class="card-title">DEPENSES</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['depenses'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">PAIEMENTS FOURNISSEURS</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['fpaiements'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">COMMISSIONS PAYEES</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['pcommissions'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h3 class="card-title">CHIFFRE D'AFFAIRE</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['factures'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-cyan">
                    <div class="card-header">
                        <h3 class="card-title">COMMISSIONS ENREGISTREES</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($data['commissions'] as $k=>$v)
                                    <?php $t= $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });

                                    $s=$s+$t;

                                    ?>
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($t,0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">ETAT GLOBAL DES MOUVEMENTS</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>MOIS</th>
                                    <th>ENTREES</th>
                                    <th>SORTIES</th>
                                    <th>MARGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s=0; ?>
                                @foreach ($mvts as $k=>$v)

                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ number_format($v['entree'],0,',','.') }} XAF</td>
                                        <td>{{ number_format($v['sortie'],0,',','.') }} XAF</td>
                                        <td>{{ number_format($v['marge'],0,',','.') }} XAF</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>TOTAL</th>
                                    <th>{{ number_format($s,0,',','.') }} XAF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <style>
    div.card-section-1{
        height:120px;
    }
    div.card-section-2{
        height:150px;
    }
    div.card_{
            height: 175px;
        }
  </style>

@endsection
