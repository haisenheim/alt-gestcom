
@extends('layouts.marchand')


@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h3 class="m-0">{{ $article->name}}</h3>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">ARTICLE</a></li>
        <li class="breadcrumb-item active">{{ $article->name }}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')

  <div class="container mb-2">
      <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card card-img card-light">
                <div class="card-header">
                      <!-- Default switch -->
                      <input  type="checkbox"  data-val="{{ $article->is_active?'true':'false' }}" id="bs-switch" data-size="mini" data-on-color="success" data-toggle="switch" data-on-text="Online" data-off-color="danger" data-off-text="Offline">
                      <ul class="pull-right list-inline">
                          <li class="list-inline-item">
                              <a href="" data-toggle="modal" data-target="#modalEdit" class="btn btn-xs btn-light"><i class="fa fa-pen"></i> </a>
                          </li>
                      </ul>
                </div>
                <div class="card-body">
                    <img src="{{ $article->photo }}" height="100" alt="">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            <h5 class="label">{{ $article->name }}</h5>
                        </li>
                        <li>
                            <span class="label">SKU : </span>
                            <span class="value">{{ $article->sku }}</span>
                        </li>
                        <li>
                            <span class="label">Prix : </span>
                            <span class="value"> {{ number_format( $article->price,0,',','.' ) }}</span>
                        </li>
                        <li>
                            <span class="value">Categorie : </span>
                            <span class="value"><a href="{{ $article->category?'/marchand/category/'.$article->category->id :'#' }}"> {{ $article->category?$article->category->name:'-' }} </a></span>
                            <img src="{{ $article->category?$article->category->photo :'#' }}" alt="ici le photo" height="100">
                        </li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <hr>
                        <li>
                            <span class="value">Resume : </span>
                            <span class="value text-bold text-justify">{{ $article->short_description }}</span>
                        </li>
                        <hr>
                        <li>
                            <span class="value">DESCRIPTION COMPLETE : </span>
                            <span class="value text-bold text-justify">{{ $article->full_description }}</span>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Chiffres</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                <h6>NOMBRE DE COMMANDES</h6>
                            </li>
                        </ul>
                    </div>
                </div>
          </div>
      </div>
  </div>




<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edition</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/update/article" method="POST">
                @csrf
                <input type="hidden" id="article_id" value="{{ $article->id }}" name="id">
                <div class="row form-group">
                    <div class="col-md-7 col-sm-12">
                        <label for="price">DESIGNATION</label>
                        <input type="text" id="name" value="{{ $article->name }}" disabled class="form-control">
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label for="price">SKU</label>
                        <input type="text" value="{{ $article->sku }}"  id="code" disabled class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="price">Prix</label>
                        <input type="number" value="{{ $article->price }}" id="price" name="price" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="fname">Photo</label>
                        <input type="file" id="fname" name="photo" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="short_description">Courte description</label>
                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="5">{{$article->short_description}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-10 col-sm-12">
                        <label for="full_description">Description complete</label>
                        <textarea name="full_description" id="full_description" cols="30" rows="5" class="form-control" >{{$article->full_description}}</textarea>
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
<script src="/js/bootstrap-switch.js"></script>
<script>
    var val = $('#bs-switch').data('val');
    var id = $('#article_id').val();
    $('#bs-switch').bootstrapSwitch('state',val);
    $('#bs-switch').on('switchChange.bootstrapSwitch', function(event, state) {
        var it = state?1:0;
        $.ajax({
            url:'/marchand/article/publish/'+id+'/'+it,
            type:'get',
            dataType:'json',
            success:function(data){
                console.log('Ok');
            }
        })
    });
</script>

@endsection
