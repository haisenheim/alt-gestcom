@extends('layouts.marchand')

@section('content')
    <div class="container p-4">
        <div class="card card-light">
            <div class="card-header">
                <h4 class="card-title">STATISTIQUES DES CAISSIERES</h4>
                <button class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#period"><i class="fas fa-clock"></i> <span>CHARGER LA PERIODE</span></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped data-table">
                        <thead>
                            <tr>
                                <th>CAISSIERE</th>
                                <th>NB OPERATIONS</th>
                                <th>CHIFFRE D'AFFAIRE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($stats))
                            @foreach ($stats as $k=>$v)
                                @php
                                    $count = count($v);
                                    $chiffre = $v->reduce(function($carry,$item){
                                        return $carry + $item->montant;
                                    });
                                @endphp
                                <tr>
                                    <td>{{ $k }}</td>
                                    <td > <span style="float: right;">{{ number_format($count,0,',','.') }}</span></td>
                                    <td> <span style="float: right;"> {{ number_format($chiffre,0,',','.') }} </span></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="period">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Choisir une periode</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="/marchand/stats/caisses">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">DU</label>
                    <input type="date" name="debut" required=true  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">AU</label>
                    <input type="date" name="fin" required=true  class="form-control">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-sm btn-danger">CHARGER</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
