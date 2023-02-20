
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">RAYONS</h1>
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
                <ul class="pull-right list-inline" style="float: right">
                    <li class="list-inline-item">
                        <a href="#" data-toggle="modal" data-target="#new" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Creer </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>LIBELLE</th>
                            <th>SOUS RAYONS</th>
                            <th>PRODUITS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rayons as $rayon)
                            <tr>
                                <td><a href="/marchand/rayon/{{ $rayon->token }}"> {{ $rayon->name }} </a></td>
                                <td>{{ $rayon->sousrayons->count() }}</td>
                                <td>{{ $rayon->articles->count() }}</td>
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
            <form enctype="multipart/form-data" action="/marchand/rayon" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="fname">First Name</label> -->
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
@endsection
