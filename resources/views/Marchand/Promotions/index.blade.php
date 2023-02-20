
@extends('layouts.marchand')


@section('content')
    <div class="container">
        <div class="card card-light">
            <div class="card-header">
                <h4>PROMOTIONS</h4>
                <div class="pull-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/marchand/promotion/create" class="btn btn-outline-secondary">Creer une promotion</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-striped">
                    <tbody>
                        @foreach ($promotions as $promotion)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ asset('img/'.$promotion->image_uri) }}" width="100" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><a href="/marchand/promotions/{{ $promotion->token }}">{{ $promotion->name }}</a></h5>
                                        <div class="row">
                                            <div class="col-sm-3 text-black text-danger" style="text-decoration:line-through">{{ number_format($promotion->before_price,0,',','.') }} XAF</div>
                                            <div class="col-sm-3 text-bold">{{ number_format($promotion->price,0,',','.') }} XAF</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-{{ $promotion->status['color'] }}">{{ $promotion->status['name'] }}</span>
                            </td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="/marchand/promotions/booster/{{ $promotion->token }}" class="btn btn-primary btn-sm">Booter cette promotion</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
