
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h2 class="m-0">CATEGORIES</h2>
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
            @foreach ($categories as $categorie )
                <div class="col-md-3 col-sm-12">
                    <div class="card card-{{$categorie->articles->count()>0?'primary':'light'}}">
                        <div style="height: 40px" class="card-header">
                            <h6 style="font-size: 0.8rem" class="card-title">{{ $categorie->name }}</h6>
                        </div>
                        <div style="height: 120px" class="card-body">
                            <img style="object-fit: cover" src="{{ $categorie->photo }}" height="100" alt="">
                        </div>
                        <div class="card-footer">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="label">Catgorie parent : </span>
                                    <span class="value">{{ $categorie->parent?$categorie->parent->name:'-' }}</span>
                                </li>
                                <li>
                                    <span class="value">{{ number_format($categorie->articles->count(),0,',','.') }} articles</span>
                                </li>
                                <hr>
                                <li>
                                    <ul style="margin-bottom: 0" class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="" data-title="{{ $categorie->name }}" data-id="{{ $categorie->id }}" data-toggle="modal" data-target="#editModal" class="btn-edit btn btn-sm btn-light"><i class="fa fa-pen"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
  </div>

  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h6 style="font-weight: bold" class="modal-title" id="emtitle"></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="/marchand/category/update" method="POST">
                @csrf
                <input type="hidden" id="emid" name="id">
                <input type="hidden" name="parent_id" value="0">
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" id="emname" name="name" class="form-control" placeholder="Nom du rayon">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control" placeholder="Nom du rayon">
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

<script>
    $('.btn-edit').click(function(){
        $('#emid').val($(this).data('id'));
        $('#emtitle').text($(this).data('title'));
        $('#emname').val($(this).data('title'));
    });
</script>

@endsection
