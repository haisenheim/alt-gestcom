@extends('layouts.marchand')



@section('content')

    <div style="" class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title">LISTE DES CLIENTS ELIGIBLES AU BONS D'ACHAT</h4>
                

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm data-table">
                        <thead>
                            <tr>
                                <th>CLIENT</th>
                                <th>MONTANT EN CARTE</th>
                                <th>MONTANT A DISTRIBUER</th>
                                <th>RESTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td><a href="/marchand/carte/{{ $d['carte']->token }}">{{ $d['carte']->client->name }}</a></td>
                                    <td>{{ number_format($d['carte']->montant,0,',','.') }}</td>
                                    <td>{{ number_format($d['nb'],0,',','.') }}</td>
                                    <td>{{ number_format($d['reste'],0,',','.') }}</td>
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


