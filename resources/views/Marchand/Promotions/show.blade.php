
@extends('layouts.marchand')


@section('content')
    <div class="container">
        <div class="card card-light mt-3">
            <div class="card-header">
                <h4>{{ $promotion->name }}</h4>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <form action="/marchand/promotions/save" enctype="multipart/form-data" class="p-4" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $promotion->id }}">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-8">
                                <input type="text" name="name" value="{{ $promotion->name }}" class="form-control"  placeholder="Nom de l'article">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Prix avant promo</label>
                                <div class="col-sm-8">
                                <input type="number" value="{{ $promotion->before_price }}" class="form-control" name="before_price" placeholder="Prix avant promotion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label text-bold">Prix promo</label>
                                <div class="col-sm-8">
                                <input type="number" value="{{ $promotion->price }}" class="form-control" name="price" placeholder="Prix de la promotion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">DEBUT</label>
                                <div class="col-sm-8">
                                <input type="date" value="{{ $promotion->from }}" class="form-control" name="from" placeholder="Prix avant promotion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">FIN</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control" value="{{ $promotion->to }}" name="to" placeholder="Prix avant promotion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">IMAGE</label>
                                <div class="col-sm-8">
                                <input type="file" class="form-control" name="image_uri" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <button class="btn btn-sm btn-danger" type="submit">Modifier</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-sm-12 p-3">
                        <div class="bg-gray p-2">
                            <h5>APERCU</h5>
                            <div>
                                <img src="{{ asset('img/'.$promotion->image_uri)}}" width="100" alt="" class="img-rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
