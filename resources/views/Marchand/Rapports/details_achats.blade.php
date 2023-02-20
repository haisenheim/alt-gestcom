@extends('layouts.marchand')

@section('content')
    <div class="container p-4">
        <div class="card card-light">
            <div class="card-header">
                <h4 class="card-title">HISTORIQUE DES ACHATS - <b> {{ date_format($dt,'d/m/Y') }}</b></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped data-table">
                        <thead>
                            <tr>
                                <th>HEURE</th>
                                <th>CLIENT</th>
                                <th>MONTANT</th>
                                <th>CASHBACK</th>
                                <th>CAISSIER(E)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                                $k = 0;
                                $carefull = false;
                            @endphp
                            @foreach ($achats as $achat)
                                @php
                                    $i++;
                                    $suspect = false;
                                    if($i<$achats->count()){
                                        $next = $achats[$i];
                                        if($next->client_id==$achat->client_id && $next->montant == $achat->montant){
                                            $suspect = true;
                                            $carefull = true;
                                            $k++;
                                        }
                                    }

                                @endphp
                                <tr class="{{ $suspect?'bg-danger':'' }}">
                                    <td><a  href="{{ asset('/img/tickets/'.$achat->imageUri) }}">{{ date_format($achat->created_at,'H:i:s') }}</a></td>
                                   <td>{{ $achat->client->name }} <span style="float: right; font-weight:bold"><small>{{ $achat->client->phone }}</small></span></td>
                                    <td > <span style="float: right;">{{ number_format($achat->montant,0,',','.') }}</span></td>
                                    <td> <span style="float: right;"> {{ number_format($achat->cashback,0,',','.') }} </span></td>
                                    <td>{{ $achat->user?$achat->user->name:'-' }}</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item"><a class="text-sm" href="/marchand/achat/disable/{{ $achat->imageUri }}" title="Annuler"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @if($carefull)
                    <div>
                        <span class="badge badge-danger"><b>{{ $k }}</b> Operations douteuses</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
