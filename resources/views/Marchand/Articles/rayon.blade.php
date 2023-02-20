
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ $rayon->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Rayons</a></li>
        <li class="breadcrumb-item active">{{ $rayon->name }}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="container mb-2">
      @if ($rayon->sousrayons->count()>1)
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">LISTE DES SOUS RAYONS</h3>
            <ul class="pull-right list-inline" style="float: right">
                <li class="list-inline-item">
                    <a href="#" data-toggle="modal" data-target="#import" class="btn btn-xs btn-info"><i class="fa fa-file-excel"></i> Importer</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>SOUS RAYONS</th>
                        <th>PRODUITS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rayon->sousrayons as $rayon)
                        <tr>
                            <td><a href="/marchand/sous-rayon/{{ $rayon->token }}"> {{ $rayon->name }} </a></td>

                            <td>{{ $rayon->articles->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>

       @elseif ($rayon->articles->count()>1)
       <div class="card">
        <div class="card-header">
            <h3 class="card-title">LISTE DES ARTICLES</h3>
            <ul class="pull-right list-inline" style="float: right">
                <li class="list-inline-item">
                    <a href="#" data-toggle="modal" data-target="#import" class="btn btn-xs btn-info"><i class="fa fa-file-excel"></i> Importer</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered data-table">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>LIBELLE</th>
                        <th>PRIX</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rayon->articles as $article)
                        <tr>
                            <td>{{ $article->code }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->price }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a data-id="{{ $article->id }}" data-name="{{ $article->name }}" data-price="{{ $article->price }}" data-code="{{ $article->code }}" href="#" data-toggle="modal" data-target="#edit" class="btn-edit text-secondary" title="Modifier" ><i class="fa fa-pen"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
      @else
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">ARTICLES OU SOUS RAYONS</h3>
            <ul class="pull-right list-inline" style="float: right">
                <li class="list-inline-item">
                    <a href="#" data-toggle="modal" data-target="#import" class="btn btn-xs btn-info"><i class="fa fa-file-excel"></i> Importer</a>
                </li>
            </ul>
        </div>
        <div class="card-body">

        </div>
      </div>
      @endif

  </div>

  <div class="modal fade" id="import">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Importer des article</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/import-into-rayon" method="POST">
                @csrf
                <input type="hidden" name="rayon_id" value="{{ $rayon->id }}">
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="fname">Fichier excel</label>
                        <input type="file" id="fname" name="file_to_upload" class="form-control">
                    </div>

                </div>



                <div class="form-group">
                    <input type="submit" value="Importer" class="btn btn-primary">
                </div>

            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edition</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/article/save" method="POST">
                @csrf
                <input type="hidden" id="article_id" name="id">
                <div class="row form-group">
                    <div class="col-md-7 col-sm-12">
                        <label for="price">LIBELLE</label>
                        <input type="text" id="name" disabled class="form-control">
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="price">CODE</label>
                        <input type="text" id="code" disabled class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="price">Prix</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="fname">Image</label>
                        <input type="file" id="fname" name="photo" class="form-control">
                    </div>
                </div>



                <div class="form-group">
                    <input type="submit" value="ENREGISTRER" class="btn btn-primary">
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
        $('#article_id').val($(this).data('id'));
        $('#price').val($(this).data('price'));
        $('#code').val($(this).data('code'));
        $('#name').val($(this).data('name'));
    })
</script>

@endsection
