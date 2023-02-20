
@extends('layouts.marchand')


@section('content')
    <div class="container">
        <div class="card card-light mt-3">
            <div class="card-header">
                <h4>Booster cette promotion</h4>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <form action="/marchand/promotions/booster"  class="p-4" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $promotion->id }}">
                            <div class="form-group">
                                <h5>AUDIENCE</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="pn" checked="" name="audience">
                                    <label class="form-check-label">Pointe-Noire</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="bzv" type="radio" name="audience">
                                    <label class="form-check-label">Brazzaville</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <h5>DEFINIR VOTRE OBJECTIF</h5>
                                <p>En définissant votre budget, vous indiquez au logiciel le montantà ne pas dépasser pour cette promotion</p>
                                <div class="mt-3">
                                    <select name="objectif" id="" class="form-control">
                                        <option value="">Séléctionner votre objectif</option>
                                        @foreach ($objectifs as $objectif)
                                            <option value="{{ $objectif->id }}">{{ $objectif->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <button class="btn btn-sm btn-primary" type="submit">Booster cette promotion</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-sm-12 p-3">
                        <div class="bg-gradient-light p-2">
                            <h5>APERCU</h5>
                            <div class="card">
                                <div class="card-body">
                                    <img style="width: 100%" src="{{ asset('img/'.$promotion->image_uri)}}" alt="" class="img-rounded">
                                </div>
                                <div class="bg-danger card-footer">
                                    <h6>{{ $promotion->name }}</h6>
                                    <div class="row">
                                        <div class="col-sm-6 text-black" style="text-decoration:line-through">{{ number_format($promotion->before_price,0,',','.') }} XAF</div>
                                        <div class="col-sm-6 text-bold">{{ number_format($promotion->price,0,',','.') }} XAF</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
