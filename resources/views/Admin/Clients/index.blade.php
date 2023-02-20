
@extends('layouts.admin')

@section('content')
  <div class="">
    <h3>LISTE DES CLIENTS</h3>
        <div class="card card-light">

            <div class="card-body">
                <div class="pull-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-secondary"><i class="fa fa-plus-circle" title="Ajouter une entreprise"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>NOM</th>
                                    <th>TELEPHONE</th>
                                    <th>EMAIL</th>
                                    <th>ADRESSE</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td> <a href="/admin/clients/{{ $client->id }}">{{ $client->name }}</a></td>
                                    <td>{{ $client->telephone }} / {{ $client->mobile }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->adresse }}</td>

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
          <h5 class="modal-title">NOUVEAU CLIENT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/clients">
        <div class="modal-body">
            @csrf
          <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="name" required placeholder="Nom" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="telephone" required placeholder="Telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="mobile"  placeholder="Mobile" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="siteweb" placeholder="Site web" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <textarea name="adresse" class="form-control" id="" cols="30" rows="3"></textarea>
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
