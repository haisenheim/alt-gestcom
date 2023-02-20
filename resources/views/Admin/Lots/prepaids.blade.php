
@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Lots de Cartes prepayees</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">Lots</li>
              <li class="breadcrumb-item active">Cartes prepayees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')
  <div class="container-fluid">
    <div class="pt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LOTS DE CARTES PREPAYEES</h3>
                <div class="pull-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a data-target="#addModal" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fa fa-plus-circle"></i> Ajouter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm data-table">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>DESIGNATION</th>
                                <th>&numero;</th>
                                <th>VALIDITE</th>
                                <th>NB CARTES</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lots as $lot )
                            <tr>
                                <td>{{ date_format($lot->created_at,'d-m-Y H:i') }}</td>
                                <td><a href="/admin/prepaid/lot/{{ $lot->token }}">{{ $lot->label }}</a></td>
                                <td>{{ $lot->name }}</td>
                                <td>{{  date_format($lot->debut,'d/m/Y') }} - {{  date_format($lot->fin,'d/m/Y') }}</td>
                                <td>{{ number_format($lot->cartes->count(),0,',','.' )}}</td>
                                <td><span class="badge badge-{{ $lot->status['color'] }}">{{ $lot->status['name'] }}</span></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU LOT DE CARTES PREPAYEES</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/lots/prepaids">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-8 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="label" placeholder="Libelle" class="form-control">
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <input type="checkbox" id="solde" name="solde"  class="custom-checkbox">
                        <label for="solde">Solde Commun</label>
                    </div>
                  </div>
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                        <input type="number" name="nb" placeholder="Nombre de cartes" class="form-control">
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="form-group">
                        <input type="number" name="plafond" disabled placeholder="Solde unique" class="form-control su">
                    </div>
                </div>
            </div>
            <fieldset>
                <legend>En cas de solde reparti</legend>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="number" name="solde_clinique" placeholder="Solde soins" class="form-control sp">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="number" name="solde_pharmacie" placeholder="Solde pharmacie" class="form-control sp">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="number" name="solde_laboratoire" placeholder="Solde examens" class="form-control sp">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Validite</legend>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="date" class="form-control" name="debut">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="date" class="form-control" name="fin">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-warning btn-sm">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <style>
    div.card a{
        color: #ce9810;
    }
  </style>
  <script>
    $('#solde').click(function(){
        if($(this).is(':checked')){
            console.log('ok');
            $('input.sp').prop('disabled',true);
            $('input.su').prop('disabled',false)

        }else{
            console.log('non ok !');
            $('input.sp').prop('disabled',false);
            $('input.su').prop('disabled',true)
        }
    })
  </script>
@endsection
