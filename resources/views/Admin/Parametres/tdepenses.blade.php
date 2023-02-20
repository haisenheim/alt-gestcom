
@extends('layouts.admin')


@section('content')
  <div class="container">
        <div class="card card-light">
            <div class="card-header">
                <h5>TYPES DE DEPENSES</h5>
            </div>
            <div class="card-body">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-plus-circle" title="Ajouter un fournisseur"></i></button>
                    </li>
                </ul>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>NOM</th>
                                <th>NOMBRE DE DEPENSES</th>
                                <th>MONTANT GLOBAL</th>
                                <th></th>

                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($tdepenses as $type)
                            <tr>
                                <td> <a href="#">{{ $type->name }}</a></td>
                                <td>{{ number_format($type->depenses->count(),0,',','.') }}</td>
                                <td>{{ number_format($type->montant,0,',','.') }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU TYPE DE DEPENSE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/parametres/tdepenses">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Nom" class="form-control">
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-secondary btn-sm">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
