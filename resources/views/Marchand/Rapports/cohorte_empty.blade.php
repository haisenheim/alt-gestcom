
@extends('layouts.marchand')



@section('content')
<div class="container rapport text-center">
    <div class="card pt-1 mt-3">
        <div class="card-header">
            <h3 class="card-title">COHORTE</h3>
            <button class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#period"><i class="fas fa-clock"></i> <span>CHARGER LA PERIODE</span></button>
        </div>
        <div class="card-body">
             <p>SELECTIONNER UNE PERIODE</p>
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
@endsection
