
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">COHORTE</h1>
    </div><!-- /.col -->
    <!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
<div class="container rapport text-center">
    <div class="card pt-1 mt-3">
        <div class="card-header">
            <h3>COHORTE</h3>
            <button class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#period"><i class="fas fa-clock"></i> <span>CHARGER LA PERIODE</span></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="wbg"></th>
                            <th class="wbg" style="font-size: 1.5rem;" colspan="{{count($semaines) }}">Activation & rétention</th>
                        </tr>
                        <tr>

                            <th class="wbg"></th>
                            @foreach ($semaines as  $semaine)
                                <?php $w = explode('_',$semaine); $f= Carbon\Carbon::parse($w[0]); $t= Carbon\Carbon::parse($w[1]);  ?>
                             <th class="wbg">{{ date_format($f,'d/m') }} au {{ date_format($t,'d/m') }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($clients as $k=>$v)
                            <?php $i++; ?>
                            <?php $w = explode('_',$k); $f= Carbon\Carbon::parse($w[0]); $t= Carbon\Carbon::parse($w[1]);  ?>
                            <tr>
                                <td class="wbg">
                                   <span style="font-size: 1rem; font-weight:700">COHORTE-{{ $i }} : {{ date_format($f,'d/m') }} au {{ date_format($t,'d/m') }} </span> <br>
                                    <span class="nb_cartes">{{ $v }}</span>
                                </td>
                                @foreach ($semaines as  $sm)
                                    <td style="padding:0" class="td" data-period1="{{ $k }}" data-period2="{{ $sm }}">
                                        <ul class="list-group">
                                            <li class="list-group-item percent">0</li>
                                            <li class="list-group-item panier">0</li>
                                        </ul>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
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
        <form method="get" action="/marchand/stats/cohorte">
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
  <script>
    $(document).ready(function(){
        $('td.td').each(function(){
            var cell = $(this);
            var p1 = $(this).data('period1');
            var p2 = $(this).data('period2');
            $.ajax({
                url:'/marchand/get_nb_achats/'+p1+'/'+p2,
                dataType:'json',
                type:'get',
                success:function(data){
                    console.log(data);
                    cell.find('li.percent').text(data.percent);
                    cell.find('li.panier').text(data.panier);
                },
                error:function(err){
                    console.log('Erreur : '+err);
                }
            });
        });
    });

  </script>
  <style>
    .nb_cartes{
        font-size: 14px;
        font-weight: 900;
    }
    .wbg{
        background-color: #c0c0c0;
    }
  </style>
@endsection
