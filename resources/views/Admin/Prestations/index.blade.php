
@extends('layouts.admin')

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-header">
                <h5 class="card-title">LISTES DES PRESTATIONS</h5>
            </div>
            <div class="card-body">
                <div class="pull-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-secondary"><i class="fa fa-plus-circle" title="Ajouter un fournisseur"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>V.</th>
                                    <th>IBC</th>
                                    <th>INTITULE</th>
                                    <th>COUT MOYEN</th>
                                    <th>PLAFOND DEFAUT</th>
                                    <th>PLAFOND ANNUEL</th>
                                    <th>TOTAL ANNUEL</th>
                                    <th>NB ACTES ANNUEL</th>
                                    <th></th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestations as $fournisseur)
                                <tr>
                                    <td>
                                        @if($fournisseur->sensible)
                                           <span class="badge badge-danger"><i class="fa fa-check-circle"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ $fournisseur->ibc }}</td>
                                    <td><a href="/admin/prestations/{{ $fournisseur->id }}"> {{ $fournisseur->name }}</a></td>
                                    <td>{{ number_format($fournisseur->cout,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->plafond_defaut,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->plafond_annuel,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->total_annuel,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->nb_actes_annuel,0,',','.') }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal" title="Modififer" data-validation='{{ $fournisseur->sensible?true:false }}' class="btn btn-warning btn-xs btn-edit" data-ibc="{{ $fournisseur->ibc }}" data-name="{{ $fournisseur->name }}" data-nb="{{ $fournisseur->nb_actes_annuel }}" data-id="{{ $fournisseur->id }}" data-plafondd="{{ $fournisseur->plafond_defaut }}" data-plafonda="{{ $fournisseur->plafond_annuel }}"><i class="fa fa-pen"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
  </div>

  <div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EDITION</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prestation/edit">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" id="ibc" required name="ibc" placeholder="IBC" class="form-control">
                </div>
            </div>
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" id="name" required name="name" placeholder="Intitule" class="form-control">
                  </div>
              </div>

            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="number" id="plafondd" name="plafond_defaut" placeholder="Plafond par defaut" class="form-control">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="number" id="plafonda" name="plafond_annuel" placeholder="Plafond annuel" class="form-control">
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="number" id="nb" name="nb_actes_annuel" placeholder="NB ACTES" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="checkbox" id="sensible" name="sensible"  class="custom-checkbox">
                    <label for="">Acte soumis a une validation prealable?</label>
                </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU PRESTATAIRE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prestataires">
        <div class="modal-body">
            @csrf
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" required name="ibc" placeholder="IBC" class="form-control">
                </div>
            </div>
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" required name="name" placeholder="Intitule" class="form-control">
                  </div>
              </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="number" name="cout_moyen" placeholder="Cout moyen" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="number" name="plafond" placeholder="Plafond par defaut" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" name="address" placeholder="Adresse" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="logo">CATEGORIE</label>
                    <select name="type_id" id="" required class="form-control">
                        <option value="">SELECTONNER ...</option>
                        @foreach ($categories as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 form-check form-group">
                <input name="public" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Acte soumis a validation obligatoire ?</label>
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

  <script>
    $('.btn-edit').click(function(){
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#plafonda').val($(this).data('plafonda'));
        $('#plafondd').val($(this).data('plafondd'));
        $('#nb').val($(this).data('nb'));
        $('#ibc').val($(this).data('ibc'));
        $('#sensible').prop('checked',$(this).data('validation'));
    });
  </script>
  <!-- /.modal -->
@endsection
