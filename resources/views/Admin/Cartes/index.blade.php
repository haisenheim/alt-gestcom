
@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Comptes Clients</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">Clients</li>
              <li class="breadcrumb-item active">Carte</li>
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
                    <th>&numero;</th>
                    <th>PORTEUR</th>
                    <th>TELEPHONE</th>
                    <th>AGE</th>
                    <th>ENTREPRISE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartes as $college )
                    <tr>
                        <td><a href="#">{{ $college->name }}</a></td>
                        <td>{{ $college->assure?$college->assure->name:'-' }}</td>
                        <td>{{ $college->assure?$college->assure->phone:'-' }}</td>

                        <td>{{ $college->assure?$college->assure->dtn?\Carbon\Carbon::parse($college->assure->dtn)->diffInYears().' ans' :'-':'-'  }}</td>
                        <td>{{ $college->assure?$college->assure->entreprise->name:'-' }}</td>
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
