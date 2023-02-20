
@extends('layouts.admin')


@section('content')
  <div class="container">
        <div class="card card-light">
            <div class="card-header">
                <h5>LISTE DES SPECIALITES</h5>
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
                                <th></th>

                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialites as $fournisseur)
                            <tr>
                                <td> {{ $fournisseur->name }}</td>

                                <td>
                                    <ul  class="list-inline">
                                        <li class="list-inline-item">
                                            @if ($fournisseur->active)
                                            <a href="/admin/parametres/specialites/disable/{{ $fournisseur->id }}" class="btn btn-xs btn-danger" title="verouiller" ><i class="fa fa-lock"></i></a>
                                            @else
                                                <a href="/admin/parametres/specialites/enable/{{ $fournisseur->id }}" class="btn btn-xs btn-success" title="deverouiller" ><i class="fa fa-unlock"></i></a>
                                            @endif
                                        </li>
                                    </ul>
                                </td>
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
          <h4 class="modal-title">NOUVELLE SPECIALITE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/parametres/specialite">
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
