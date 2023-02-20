
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">RAPPORTS</h1>
    </div><!-- /.col -->
    <!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
<div class="container rapport text-center">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-sm table table-striped data-table">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>CARTES ACTIVES</th>
                            <th>TOTAL DES VENTES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jours as $k=>$v)
                            <?php
                                $date = \Carbon\Carbon::parse($k);
                                $values = collect($v);
                                $cartes = $values->groupBy('carte_id');
                                $ventes = $values->reduce(function($carry,$item){
                                    return $carry + $item->montant;
                                });
                            ?>
                            <tr>
                                <td> <a href="/marchand/rapports/details/{{ $k }}">{{ date_format($date,'d-m-Y') }}</a></td>
                                <td>{{ count($cartes) }}</td>
                                <td>{{ number_format($ventes,0,',','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
