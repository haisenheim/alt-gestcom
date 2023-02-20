
@extends('layouts.admin')

@section('content')
  <div class="">
    <h3>LISTE DES COMMERCIAUX</h3>
        <div class="card card-light">

            <div class="card-body">
                <div class="pull-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter "> Creer</i></button>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>NOM</th>
                                    <th>TELEPHONE</th>
                                    <th>CLIENT</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td> <a href="/admin/commerciales/{{ $client->id }}">{{ $client->name }}</a></td>
                                    <td>{{ $client->telephone }}</td>
                                   <td>{{ $client->client?$client->client->name:'-' }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">NOUVEAU COMMERCIAL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/commerciales">
        <div class="modal-body">
            @csrf
          <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Nom" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="Prenom" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="telephone" placeholder="Telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <select name="client_id" class="form-control" required id="">
                            <option value="">Client ...</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
