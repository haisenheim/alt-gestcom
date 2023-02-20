
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">CATEGORIES</h1>
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
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <a href="#" data-toggle="modal" data-target="#new" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Creer un rayon</a>
                        <ul style="float: right;" class="pull-right list-inline">
                            <li class="list-inline-item">
                                <a class="btn btn-sm text-primary" href="#"><i class="fa fa-list"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm" href="/marchand/categories/grid"><i class="fa fa-th"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="">
                          <ul id="tree1">
                              @foreach($categories as $category)
                                  <li>
                                    <span><img src="{{ $category->photo }}" height="25" alt=""></span>
                                    @if ($category->articles->count())
                                    <a href="/marchand/category/{{ $category->id }}">{{ $category->name }}</a>
                                    <span><a href="#" class="btn btn-import btn-xs btn-light" title="Importer"  data-target="#modalImport" data-id="{{ $category->id }}" data-name="{{ $category->name}}" data-toggle="modal"><i class="fa fa-download"></i></a></span>
                                    <span><a href="#" class="btn btn-add btn-xs btn-success" data-id="{{ $category->id }}" title="Ajouter un sous rayon" data-target="#newSR" data-toggle="modal"><i class="fa fa-plus"></i></a></span>
                                    @else
                                    {{ $category->name }}
                                    <span><a href="#" data-name="{{ $category->name}}" data-id={{ $category->id }} class="btn-import btn btn-xs btn-light" title="Importer"  data-target="#modalImport" data-toggle="modal"><i class="fa fa-download"></i></a></span>
                                    <span><a href="#" class="btn btn-xs btn-add btn-success" data-id="{{ $category->id }}" title="Ajouter un sous rayon" data-target="#newSR" data-toggle="modal"><i class="fa fa-plus"></i></a></span>
                                    @endif
                                      @if(count($category->children))
                                          @include('includes.manageChild',['childs' => $category->children])
                                      @endif

                                  </li>
                              @endforeach
                          </ul>
                          <link rel="stylesheet" href="{{asset('css/treeview.css')}}">
                        <script src="/js/treeview.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $first?$first->name:'Aucun produit' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>CODE</th>
                                        <th>DESIGNATION</th>
                                        <th>PRIX</th>
                                        <td>MODE DE VENTE</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($first)

                                    @foreach ($first->articles as $article )
                                        <tr>
                                            <td class="td-img" data-src="{{ $article->photo }}"><img src="" height="50" alt=""></td>
                                            {{-- <td><img src="http://{{ $article->photo }}" height="75" alt=""></td> --}}
                                            <td>{{ $article->sku }}</td>
                                            <td><a href="/marchand/article/{{ $article->sku }}">{{ $article->name }} </a></td>
                                            <td>{{ number_format($article->price,0,',','.') }}</td>
                                            <td><span class="badge badge-{{ $article->poids_prix?'warning':'info' }}">{{ $article->poids_prix?'Poids/Prix':'QUANTITE' }}</span></td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                            <a title="Editer le produit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEdit" href="#">Editer</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
            <form enctype="multipart/form-data" action="/marchand/category" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="0">
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nom du rayon">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="photo">Photo</label>
                        <input type="file" required id="photo" name="photo" class="form-control" placeholder="Nom du rayon">
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
</div>

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



<div class="modal fade" id="newSR">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nouveau sous rayon</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/category" method="POST">
                @csrf
                <input type="hidden" id="category_id" name="parent_id" value="0">
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nom du rayon">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="photo">Photo</label>
                        <input type="file" required id="photo" name="photo" class="form-control" placeholder="Nom du rayon">
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
</div>

<div class="modal fade" id="modalImport">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Importer dans <span style="color: #999"  id="catname"></span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/category/import" method="POST">
                @csrf
                <input type="hidden" id="cat_id" name="category_id" value="">
                <div class="row form-group">
                    <div class="col-md-9 col-sm-12">
                        <label for="fname">Fichier excel</label>
                        <input type="file" id="fname" name="file_to_upload" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="pp">POIDS/PRIX</label>
                        <input type="checkbox" id="pp" name="pp" class="">
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

<script>
    $(document).ready(function(){
        loadImg();
    });

    $('.page-link').click(function(){
        loadImg();
    });
    function loadImg(){
        $('.td-img').each(function(){
        var src = $(this).data('src');
        $(this).find('img').eq(0).prop('src', src);
        });
    };
   /*  $('.td-img').each(function(){
        var src = $(this).data('src');
        $(this).find('img').eq(0).prop('src', src);
    }); */
</script>

<script>
    $('.btn-add').click(function(){
        $('#category_id').val($(this).data('id'))
    });

    $('.btn-import').click(function(){
        $('#cat_id').val($(this).data('id'));
        $('#catname').text($(this).data('name'));
        //$('#modalImport').modal('show');
    });
</script>

<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
<link rel="stylesheet" href="{{asset('css/treeview.css')}}">
<script src="{{asset('js/treeview.js')}}"></script>

@endsection
