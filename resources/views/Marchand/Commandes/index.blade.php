
@extends('layouts.marchand')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Commandes Clients</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">Clients</li>
              <li class="breadcrumb-item active">Commandes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')
  <div class="container-fluid">
    <div class="">

        <table class="table table-bordered table-striped table-sm data-table">
            <thead>
                <tr>
                    <th>Date et heure</th>
                    <th>Commande</th>
                    <th>Client</th>
                    <th>Montant</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                    <tr>
                        <td>{{ date_format($order->created_at, 'd/m/Y H:i') }}</td>
                        <td><a href="/marchand/commandes/{{ $order->token }}">{{ $order->name }}</a></td>
                        <td>{{ $order->client?$order->client->name . " - " .$order->client->phone:'-'  }}</td>
                        <td>{{ number_format($order->montant,0,',','.') }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      </div>
  </div>
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
