@extends('......layouts.pharmacie')

@section('page-title')
{{ $facture->name }}
@endsection

@section('content')

    <div style="padding-top: 30px" class="container">
        <div class="">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  CLINIQUE:
                  <address>
                    <strong>{{ $facture->centre->name }} </strong><br>
                    {{ $facture->centre->address }}<br>

                    Téléphone: {{ $facture->centre->phone }}<br>
                    Email: {{ $facture->centre->email }}<br/>

                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant, 0,',','.') }} </b><br>
                  <br>


                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                   <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DATE</th>
                                <th>MONTANT</th>
                                <th>CARTE</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($facture->paiements)
                                <?php $i=1 ?>
                                @foreach($facture->paiements as $ligne)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ date_format($ligne->created_at, 'd/m/Y') }}</td>
                                        <th>{{ number_format($ligne->cout, 0,',','.') }}</th>
                                        <td>{{ $ligne->carte?$ligne->carte->name:'-' }}</td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                   </table>
                </div>
              </div>



            <!-- /.invoice -->

        </div>
    </div>
    </div>
@endsection


@section('nav_actions')
<main>
    <nav style="top:30%" class="floating-menu">
        <ul class="main-menu">


                @if(!$facture->confirmed_at && $facture->filled_at)
                   <li>
                        <a style="background-image: radial-gradient(circle,#000 10%,#28a745 10.01%);" title="Valider le paiement" class="ripple" href="/pharmacie/facture/fill/{{ $facture->token }}"><i style="color: #f0f6ff" class="fa fa-coins fa-lg"></i></a>
                   </li>
                @endif

        </ul>
        <div style="background: transparent" class="menu-bg"></div>
    </nav>
</main>

@endsection

