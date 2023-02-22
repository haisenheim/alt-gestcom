@extends('layouts.admin')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div id="invoice" class="invoice p-3 mb-3">
              <!-- title row -->
              <div style="display: absolute; height:140px">
                    <div style="display:flex; justify-content: space-between;">
                        <div style="height:90px; width:90px">
                            <img style="height:90px; width:90px" src="{{ asset('img/logo.png') }}" alt="">
                        </div>
                        <div style="">
                            <div style="width: 1000px; margin: 5px auto; padding-left:20px;">
                                <h2 style="margin-left : 200px">ETS CHRISTEVIE</h2>
                                <h4 style="">FROID GENERAL & VENTE EQUIPEMENTS - ACCESSOIRES</h4>
                                <h6 style="">Adresse : Mahouata - Avenue MOE PRATT</h6>
                                <h6 style="">TELEPHONE: +242 06 631 32 11 - Email : nonochristevie@gmail.com </h6>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
              </div>
              <hr/>
              <h5>FACTURE &numero; {{ $facture->reference }}</h5>
              <!-- info row -->
              <div class="row invoice-info">

                @if ($facture->client)
                <div class="col-sm-6 invoice-col">
                    CLIENT: <strong>{{ $facture->client->name }} </strong>
                    <address>
                      Adresse : {{ $facture->client->address }}<br>

                      Téléphone: {{ $facture->client->telephone }}<br>
                      Email: {{ $facture->client->email }}<br/>

                    </address>
                </div>
                @else
                <div class="col-sm-6 invoice-col">
                    CLIENT:<strong>{{ $facture->client_name }} </strong>
                </div>
                @endif
                <!-- /.col -->


                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    <span class="float-right">DATE DE CREATION : {{ date_format($facture->created_at,'d/m/Y') }}</span>

                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>

                                <th>DESIGNATION</th>
                                <th>PU</th>
                                <th>QUANTITE</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($facture->lignes as $ligne)
                                    <tr>
                                       <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                       <td>{{ number_format($ligne->montant,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->quantite,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->montant,0,',','.') }}</td>
                                    </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="mt-3">
                    <p>DELAI DE PAIEMENT : {{ $facture->delai?$facture->delai->name:'Paiement immediat' }}</p>
                </div>

                <hr>

                <div class="footer">
                    <div style="border: 2px #000; border-top-width: 2px;"></div>
                    <div>
                        <p>PIED DE PAGE</p>
                    </div>
                </div>

              </div>

            <!-- /.invoice -->
        </div>
        <hr>
        <div class="card bg-light mt-3">
            <div class="card-header">
                <h3 class="card-title">HISTORIQUE DES PAIEMENTS</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>REFERENCE</th>
                            <th>MONTANT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facture->paiements as $paiement)
                            <tr>
                                <td>{{ date_format($paiement->created_at,'d/m/Y H:i') }}</td>
                                <td>{{ $paiement->reference }}</td>
                                <td>{{ number_format($paiement->montant,0,',','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="payerModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">NOUVEAU PAIEMENT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="POST" action="/admin/paiements">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="facture_id" value="{{ $facture->id }}">
              <div class="row">
                  <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                          <input type="number" name="montant" placeholder="Montant" class="form-control">
                      </div>
                  </div>

              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-secondary">Enregistrer</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="actions" id="actions-section">
            <ul id="float-menu" style="position:fixed; top:150px; right:50px;" class="list-unstyled">
                <li class="">
                    <a  title="Imprimer" id="btn-print" class="ripple" href="#"><i class="fa fa-print fa-lg text-info"></i></a>
                </li>
                @if($facture->reste>0)
                <li class="">
                    <a  title="Effectuer un paiement" data-toggle="modal" data-target='#payerModal' class="ripple" href="#"><i class="fa fa-coins fa-lg text-warning"></i></a>
                </li>
                @endif
                @if($facture->versement==0)
                <li class="">
                    <a  title="Modfier"  href='/admin/factures/edit/{{ $facture->id }}' class="ripple"><i class="fa fa-edit fa-lg text-success"></i></a>
                </li>
                @endif
        </ul>
      </div>
    <style>
        div.content{
            background-color: #eeeeee;
        }

        footer {
  font-size: 9px;
  color: #f00;
  text-align: center;
}

@page {
  size: A4;
  margin: 11mm 17mm 17mm 17mm;
}

@media print {
  footer {
    position: fixed;
    bottom: 0;
  }

  .content-block, p {
    page-break-inside: avoid;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
}

    </style>

    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script>
        $('#btn-print').click(function(){
            $("#invoice").print({
                addGlobalStyles : true,
                stylesheet : 'https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css',
                rejectWindow : true,
                noPrintSelector : ".no-print",
                iframe : true,
                append : null,
                prepend : null
            });
        });
    </script>
@endsection


