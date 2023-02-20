
@extends('layouts.admin')

@section('content')
  <div class="container-fluid">
    <div class="pt-2">
       <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h4 class="card-title">{{ $carte->name }}</h4>
                        <div class="pull-right">
                            <div class="btn-group">

                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"></button>
                            <ul class="dropdown-menu">
                                @if (!$carte->allocated_at)
                                 <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#addAgent">Allouer</a></li>
                                 @else
                                    @if ($carte->locked_at)
                                        <li><a class="dropdown-item" href="/admin/prepaid/carte/enable/{{ $carte->token }}">Debloquer</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="/admin/prepaid/carte/disable/{{ $carte->token }}">Bloquer</a></li>
                                    @endif
                                @endif

                            </ul>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            <h3>{{ $carte->assure?$carte->assure->name:'-' }}</h3>
                        </p>
                        <p>
                            <h5>{{ $carte->assure?$carte->assure->address:'-' }}</h5>
                        </p>
                        <p>
                            <h6>{{ $carte->assure?$carte->assure->phone:'-' }}</h6>
                        </p>
                        @if($carte->montant!=-1)
                            <p>
                               <span>Solde Commun : </span> <span>{{ $carte->montant }}</span>
                            </p>
                        @else
                         <p>
                            <span class="label">Solde clinique : </span> <span class="value">{{ $carte->solde_clinique }}</span>
                         </p>
                         <p>
                            <span class="label">Solde pharmacie : </span> <span class="value">{{ $carte->solde_pharmacie }}</span>
                         </p>
                         <p>
                            <span class="label">Solde examen : </span> <span class="value">{{ $carte->solde_laboratoire }}</span>
                         </p>

                        @endif
                        <p>Status : <span class="badge badge-{{ $carte->status['color'] }}">{{ $carte->status['name'] }}</span></p>

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CONSOMMATIONS</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover data-table">
                                <thead>
                                      <tr>
                                            <th>#</th>
                                            <th>PRESTATAIRE</th>
                                            <th>PRESTATION</th>
                                            <th>MONTANT</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carte->consommations as $consommation)
                                        <tr>
                                            <td>{{ date_format($consommation->created_at,'d/m/Y H:i') }}</td>
                                            <td>{{ $consommation->prestataire?$consommation->prestataire->name:'-' }}</td>
                                            @if($consommation->produit && $consommation->prestataire->type_id==2)
                                                 <td>{{ $consommation->produit?$consommation->produit->name:'-' }}</td>
                                            @else
                                                 @if ($consommation->prestation && $consommation->prestataire->type_id==1)
                                                 <td>{{ $consommation->prestation->acte?$consommation->prestation->acte->name:'-' }}</td>
                                                @else
                                                @if($consommation->examen && $consommation->prestataire->type_id==3)
                                                <td>{{ $consommation->examen?$consommation->examen->name:'-' }}</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                @endif
                                            @endif

                                            <td>{{ number_format($consommation->montant,0,',','.') }}</td>
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
  <div class="modal fade" id="addAgent">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEL AGENT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/admin/prepaid/carte/owner">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="carte_id" value="{{ $carte->id }}">
          <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" required name="last_name" placeholder="NOM" class="form-control">
                    </div>
                </div>
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" required name="first_name" placeholder="Prenom" class="form-control">
                  </div>
              </div>
            <div class="col-md-7 col-sm-12">
                <div class="form-group">
                    <input type="text" name="address" placeholder="Adresse" class="form-control">
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" required placeholder="Telephone" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Date de naissance</label>
                    <input type="date" name="dtn" required  class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="photo" placeholder="" required class="form-control">
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <style>
    div.card a{
        color: #ce9810;
    }
  </style>
@endsection
