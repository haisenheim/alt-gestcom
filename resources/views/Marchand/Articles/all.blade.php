
@extends('layouts.marchand')

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

  <div class="container mb-2">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered data-table">
                    <thead>
                        <tr>
                            <th>DESIGNATION   </th>
                            <th>PRIX </th>
                            <th>SOUS RAYON</th>
                            <th>RAYON</th>
                            <th>MODE DE VENTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->name }} @if($article->promotion) <span class="badge  badge-{{ $article->promotion->active?'success':'danger' }}">En promo</span> @else <a href="/marchand/promo/add/{{ $article->id }}" class="btn btn-xs btn-warning">Mettre en promo</a>@endif </td>
                                <td>{{ number_format($article->price,0,',','.') }}</td>

                                <td>{{ $article->category?$article->category->name:'-' }}</td>
                                <td>{{ $article->category?$article->category->parent?$article->category->parent->name:'-':'-' }}</td>
                                 <td><span class="badge badge-{{ $article->poids_prix?'warning':'info' }}">{{ $article->poids_prix?'Poids/Prix':'Quantite' }}</span></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>

  <div class="modal fade" id="new">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nouveau rayon</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/marchand/rayon" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nom de l'option">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Creer" class="btn btn-primary">
                </div>

            </form>
        </div>

      </div>
      <!-- /.modal-content -->
  </div>
    <!-- /.modal-dialog -->

    <div class="modal fade" id="madalEdit">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edition du produit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/marchand/article/save" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="fname">First Name</label> -->
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enregistrer" class="btn btn-success">
                    </div>

                </form>
            </div>

          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
</div>
@endsection
