
@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">ARTICLES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Articles</a></li>
        <li class="breadcrumb-item active">all</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <h3>LISTE DES ARTICLES</h3>
  <div class="card">
        <div class="card-body">
            <div class="float-right">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button data-target="#addModal" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter un article"></i> Ajouter article</button>
                    </li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm data-table">
                    <thead>
                        <tr>
                            <th>DESIGNATION</th>
                            <th>CATEGORIE</th>
                            <th>PRIX</th>
                            <th>QUANTITE EN STOCK</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article )
                            <tr>
                                <td>{{ $article->name }}</td>
                                <td>{{ $article->category?$article->category->name:'-' }}</td>
                                <td>{{ number_format($article->pv,0,',','.') }}</td>
                                <td>{{ number_format($article->quantite,0,',','.') }}</td>
                                <td><a class="btn btn-info btn-xs btn-edit" data-id="{{ $article->id }}" data-target="#valModal" data-toggle="modal" href="">Actualiser</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEL ARTICLE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/admin/parametres/articles" method="post">
                @csrf

                <div class="row">
                  <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                          <select name="category_id"  required class="form-control">
                              <option value="">Categorie ...</option>
                              @foreach ($categories as $type)
                                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-8 col-sm-12">
                      <div class="form-group">
                          <input type="text" placeholder="Designation" required name="name" id="name" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                         <input type="number" name="pv" required placeholder="Prix de vente" class="form-control" id="">
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                       <input type="number" name="quantite" required placeholder="Quantite initiale" class="form-control" id="">
                    </div>
                </div>
                </div>
                  <div>
                      <button type="submit" class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
                  </div>
            </form>
        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="valModal">
    <div class="modal-dialog moda-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE QUANTITE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/admin/parametres/article/actu" method="post">
                @csrf
                <input type="hidden" name="article_id" id="article_id">
                <div class="row">

                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                       <input type="number" name="quantite" required placeholder="Quantite" class="form-control" id="">
                    </div>
                </div>
                </div>
                  <div>
                      <button type="submit" class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
                  </div>
            </form>
        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
    $('.btn-edit').click(function(){
        var id = $(this).data('id');
        $('#article_id').val(id);
    });
  </script>
@endsection
