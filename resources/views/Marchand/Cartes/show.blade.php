
@extends('layouts.marchand')



@section('content')
  <div class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-12">
            <div class="card bg-light carte">
                <div class="card-header">
                    <h4 class="card-title">{{ $carte->client->name }}</h4>
                </div>
                <div class="card-footer">
                    <h4 style="font-size:1rem;">SOLDE: <b>{{ number_format($carte->montant,0,',','.') }}</b></h4>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9 col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">HISTORIQUE DES ACHATS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>MONTANT</th>
                                        <th>CASHBACK</th>
                                        <th>CAISSIER(E)</th>
                                        <th>PHOTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carte->achats as $achat)
                                        <tr>
                                            <td>{{ date_format($achat->created_at,'d/m/Y H:i:s') }}</td>
                                            <td>{{ number_format($achat->montant,0,',','.') }}</td>
                                            <td>{{ number_format($achat->cashback,0,',','.') }}</td>
                                            <td>{{ $achat->user?$achat->user->name:'-' }}</td>
                                            <td><a href="{{ asset('/img/tickets/'.$achat->imageUri) }}">{{ $achat->imageUri }}</a></td>
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
  </div>

  <style>
    .carte h3{
        font-size: 1.1rem;
    }
    .carte h4{
        font-size: 0.9rem;
    }
    .carte h5{
        font-size: 0.75rem;
    }
    .carte h6{
        font-size: 0.7rem;
    }
  </style>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/canvasjs.min.js')}}"></script>

@include('includes.data-table')
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>


@endsection
