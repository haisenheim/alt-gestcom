
@extends('layouts.admin')

@section('content')
  <div class="conatiner">

        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Etat - Veuillez selectionner la periode</h3>
            </div>
            <div class="card-body">
                <form action="/admin/etats/global/print" method="get">
                    <div class="row">
                        <div c  lass="col-md-2">
                            <div class="form-group">
                                <label for="">DU</label>
                                <input type="date" name="du" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">AU</label>
                                <input type="date" name="au" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2 mt-4">
                            <div style="padding-top:10px" class="form-group">
                                <button type="submit" title="Search" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </div>

@endsection
