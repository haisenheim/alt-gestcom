
@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ $fournisseur->name }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">{{ $fournisseur->name }}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="row">
        <div class="col-md-4">

            <div class="">
                <ul class="list-inline pull-right">
                    <li class="list-inline-item">
                        <button data-target="#editFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-edit" title="Modifier"></i></button>
                    </li>
                </ul>

            </div>
            <div style="margin:20px;" class="text-center">
                <img src="{{ $fournisseur->logo }}" alt="" style="border-radius:50%; width: 100px; height:100px; object-fit:cover" height="172" class="img-rounded">
            </div>

            <div class="">
                <img src="{{ $fournisseur->photo }}" alt="" style="width: 240px; height:220px; object-fit:cover" height="172" class="img-rounded">
            </div>
            <div class="card">
                <div class="card-body">
                    <h4><span class="label">VILLE : </span><span class="value">{{ $fournisseur->city }}</span></h4>
                    <h4><span class="label">TEL : </span><span class="value">{{ $fournisseur->phone }}</span></h4>
                    <h4><span class="label">EMAIL : </span><span class="value">{{ $fournisseur->email }}</span></h4>
                    <h4><span class="label">POURCENTAGE : </span><span class="value">{{ number_format($fournisseur->percent,2,',','.') }}%</span></h4>
                    <h3> {{ $fournisseur->type?$fournisseur->type->name:'-' }} </h3>

                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-6">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Cartes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Rayons</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover data-table">
                            <thead>
                                <tr>
                                    <th>Porteur</th>
                                    <th>Creation</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fournisseur->cartes as $carte)
                                    <tr>
                                        <td>{{ $carte->client?$carte->client->name:'-' }}</td>
                                        <td>{{ date_format($carte->created_at,'d/m/Y H:i:s') }}</td>
                                        <td>{{ number_format($carte->montant,2,',','.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <ul id="tree1">
                        @foreach($categories as $category)
                            <li>
                              <span><img src="{{ $category->photo }}" height="50" alt=""> </span>
                              @if ($category->articles->count())
                              <a href="#">{{ $category->name }} <span> ({{ $category->articles->count() }})</span></a>
                              @else
                              {{ $category->name }} <span> ({{ $category->articles->count() }})</span>
                              @endif
                                @if(count($category->children))
                                    @include('includes.manageChildCat',['childs' => $category->children])
                                @endif

                            </li>
                        @endforeach
                    </ul>
                    <link rel="stylesheet" href="{{asset('css/treeview.css')}}">
                  <script src="/js/treeview.js"></script>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
  </div>

  <div class="modal fade" id="editFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ $fournisseur->name }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="/admin/fournisseurs/update">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id" value="{{ $fournisseur->id }}">
          <div class="row">
              <div class="col-md-8 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" value="{{ $fournisseur->name }}" placeholder="Nom" class="form-control">
                  </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="text" name="percent" value={{ $fournisseur->percent }} placeholder="Pourcentage" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" value={{ $fournisseur->phone }}  placeholder="Telephone" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <select name="type_id" required id="" class="form-control">
                        <option value="{{ $fournisseur->type_id }}">{{ $fournisseur->type?$fournisseur->type->name:'FAMILLE' }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="logo">LOGO</label>
                    <input type="file" class="form-control" name="logo">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="image">PHOTO</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-save"></i> Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <link rel="stylesheet" href="{{asset('css/treeview.css')}}">
<script src="{{asset('js/treeview.js')}}"></script>
  <style>
      .label{
          font-size: 0.8rem;
          font-weight: 600;
      }
      .value{
          font-size: 0.9rem;
          font-weight: 800;
          color: #777777
      }
  </style>
@endsection
