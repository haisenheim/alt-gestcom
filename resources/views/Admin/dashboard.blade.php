
@extends('layouts.admin')


@section('content')
<script src="{{ asset('js/chart.min.js') }}"></script>
  <div class="container p-3">
        <h4>TABLEAU DE BORD</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">ETAT DES PAIEMENTS CLIENTS</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">ETAT DES DEPENSES ANNUELLES</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
