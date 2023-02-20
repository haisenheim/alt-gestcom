
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

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">LISTE DES CATEGORIES / RAYONS</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>CATEGORIE</th>
                                        <th>CATEGORIE PARENT</th>
                                        <th>NOMBRE DE PRODUITS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $categorie )
                                        <tr>
                                            <td class="td-img" data-src="{{ $categorie->photo }}"><img src="" height="100" alt=""></td>
                                            <td><a href="/marchand/category/{{ $categorie->id }}">{{ $categorie->name }} </a></td>
                                            <td>{{ $categorie->parent?$categorie->parent->name:'-' }}</td>
                                            <td>{{ number_format($categorie->articles->count(),0,',','.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
  </div>



<script>
        $('.td-img').each(function(){
            var src = $(this).data('src');
            $(this).find('img').eq(0).prop('src', src);
        });
</script>

@endsection
