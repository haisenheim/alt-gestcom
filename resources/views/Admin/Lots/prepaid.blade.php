
@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Lots de Cartes prepayees</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">Lots</li>
              <li class="breadcrumb-item active">Cartes prepayees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')
  <div class="container-fluid">
    <div class="pt-2">
       <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="card-title">{{ $lot->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h4>{{ $lot->label }}</h4>
                        <p>
                             <span>{{ $lot->cartes->count() }}</span> <span>cartes</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">LITE DE CARTES PREPAYEES</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm data-table">
                                <thead>
                                    <tr>
                                        <th>&numero;</th>
                                        <th>Porteur</th>
                                        @if($lot->plafond==-1)
                                        <th>Solde soins</th>
                                        <th>Solde pharmacie</th>
                                        <th>Solde examens</th>
                                        @else
                                        <th>Solde unique</th>
                                        @endif
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lot->cartes as $carte )
                                    <tr>
                                        <td><a href="/admin/prepaid/carte/{{ $carte->token }}">{{ $carte->name }}</a></td>
                                        <td>{{ $carte->assure?$carte->assure->name:'-' }}</td>
                                        @if($lot->plafond==-1)
                                        <td>{{ number_format($carte->solde_clinique,0,',','.' )}}</td>
                                        <td>{{ number_format($carte->solde_pharmacie,0,',','.' )}}</td>
                                        <td>{{ number_format($carte->solde_laboratoire,0,',','.' )}}</td>
                                        @else
                                        <td>{{ number_format($carte->montant,0,',','.' )}}</td>
                                        @endif
                                        <td><span class="badge badge-{{ $carte->status['color'] }}">{{ $carte->status['name'] }}</span></td>

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
    div.card a{
        color: #ce9810;
    }
  </style>
@endsection
