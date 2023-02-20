@extends('layouts.marchand')



@section('content')

    <div style="" class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title">BONS D'ACHAT RECEMMENT GENERES</h4>
                <div class="pull-right">
                    <span class="pull-right">Date d'expiration : <strong>{{ date_format($dt,'d/m/Y') }}</strong></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/marchand/bons-achat/export/{{ $dt }}" class="btn btn-sm btn-light"><i class="fa fa-file-excel text-success"></i> Exporter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm data-table">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>CLIENT</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $bon)
                                <tr>
                                    <td>{{ $bon->name }}</td>
                                    <td><a href="/marchand/bon-achat/{{ $bon->token }}">{{ $bon->client->name }}</a></td>
                                    <td>{{ number_format($bon->montant,0,',','.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <style>
        div.content{
            background-color: #eeeeee;
        }
    </style>
@endsection


