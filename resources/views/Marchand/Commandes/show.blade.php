
@extends('layouts.marchand')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Commande : {{ $order->name }}</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">Commandes</li>
              <li class="breadcrumb-item active">{{ $order->name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div style="padding-top: 30px; background:#eee; display:flex;justify-content:center" class="container">
        <div  class="">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <small class="float-right">Date: {{ date_format($order->created_at,'d/m/Y H:i') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  CLIENT:
                  <address>
                    <strong>{{ $order->client?$order->client->name:'-' }} </strong><br>


                    Téléphone: {{ $order->client?$order->client->phone:'-' }}<br>


                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($order->total, 0,',','.') }} </b><br>
                  <br>


                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                   <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DESIGNATION</th>
                                <th>P.U</th>
                                <th>QUANTITE</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($order->lignes)
                                <?php $i=1 ?>
                                @foreach($order->lignes as $ligne)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                        <td>{{ number_format($ligne->price,0,',','.') }}</td>
                                        <td>{{ number_format($ligne->quantity,0,',','.') }}</td>
                                        <td>{{ number_format($ligne->montant,0,',','.') }}</td>
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


@endsection
