
@extends('layouts.admin')

@section('content')
  <div class="">
        <h3>JOURNAL DES ENTREES</h3>
        <div class="card card-light">
            <div class="card-body">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-secondary"><i class="fa fa-plus-circle" title="Ajouter un fournisseur"></i></button>
                    </li>
                </ul>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>DATE</th>
                                <th>TYPE</th>
                                <th>MONTANT</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($depenses as $depense)
                            <tr>
                                <td>{{ $depense->done_at? date_format($depense->done_at,'d/m/Y H:i'):date_format($depense->created_at,'d/m/Y H:i') }}</td>
                                <td>{{ $depense->type?$depense->type->name:'-' }}</td>
                                <td>{{ number_format($depense->montant,0,',','.') }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $depenses->links() }}
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE DEPENSE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/depenses">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="date" name="done_at" required  class="form-control">
                  </div>
              </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="number" name="montant" placeholder="montant" required class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <select name="type_id" id="client_id" required class="form-control">
                        <option value="">TYPE ...</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-secondary">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
