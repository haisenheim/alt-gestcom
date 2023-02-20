
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">PROMOTIONS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Articles en promo</a></li>
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
                            <th>DESIGNATION</th>
                            <th>PRIX  REEL</th>
                            <th>PRIX PROMO</th>
                            <th>SOUS RAYON</th>
                            <th>RAYON</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $promo)
                            <tr>
                                <td>{{ $promo->article?$promo->article->name:'-' }}</td>
                                <td>{{ $promo->article?number_format($promo->article->price,0,',','.'):'-' }}</td>
                                <td>{{ number_format($promo->price,0,',','.') }}</td>
                                <td>{{ $promo->article?$promo->article->category?$promo->article->category->name:'-':'-' }}</td>
                                <td>{{ $promo->article?$promo->article->category?$promo->article->category->parent?$promo->article->category->parent->name:'-':'-':'-' }}</td>
                                <td>
                                    <ul class="list-inline">
                                        @if ($promo->active)
                                            <li class="list-inline-item"><a href="/marchand/promo/disable/{{ $promo->token }}" class="btn btn-xs btn-danger"><i class="fa fa-lock"></i> Arreter</a></li>
                                        @else
                                        <li class="list-inline-item"><a href="/marchand/promo/enable/{{ $promo->token }}" class="btn btn-xs btn-success"><i class="fa fa-unlock"></i> Demarrer</a></li>
                                        @endif
                                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#editM" data-id="{{ $promo->id }}" class="btn btn-xs btn-info btn-edit"><i class="fa fa-edit"></i> Modifier</a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>
  <script>
      $('.btn-edit').click(function(){
        $('#price').val($(this).data('id'));
      });
  </script>

  <div class="modal fade" id="editM">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier le prix promo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/marchand/promo/save" method="POST">
                @csrf
                <input type="hidden" id="price" name="id">
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="number" id="price" name="price" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Enregister" class="btn btn-success btn-sm">
                </div>

            </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
