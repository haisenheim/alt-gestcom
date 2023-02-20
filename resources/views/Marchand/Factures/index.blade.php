@extends('layouts.marchand')



@section('content')

    <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="table-lots" class="table table-bordered table-hover table-condensed">
                                      <thead>
                                      <tr>

                                        <th>#</th>
                                        <th>CLINIQUE</th>
                                        <th>MOIS</th>
                                        <th>Payé le </th>
                                        <th>Paiement confirmé le</th>
                                        <th>Statut</th>

                                        <th>MONTANT</th>
                                        <th></th>

                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $total = 0; $net = 0 ?>
                                      @foreach($factures as $facture)
                                            <tr>
                                                <?php $total = $total + $facture->montant; ?>
                                                <td>{{ $facture->name }}</td>
                                               <td>{{ $facture->centre?$facture->centre->name:'-' }}</td>
                                               <td>{{ $facture->mois?$facture->mois->name . '/'.$facture->annee:'-'  }}</td>
                                               <td>{{ $facture->filled_at?date_format($facture->filled_at,'d/m/Y'):'-' }}</td>
                                               <td>{{ $facture->confirmed_at?date_format($facture->confirmed_at,'d/m/Y'):'-' }}</td>
                                               <td><span class="badge badge-{{$facture->meta['color']}}">{{ $facture->meta['status'] }}</span></td>
                                               <th>{{ number_format($facture->montant,0,',','.') }}</th>
                                               <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a title="Afficher" class="btn btn-xs btn-info" href="/pharmacie/facture/{{ $facture->token }}"><i class="fa fa-eye"></i></a>
                                                        </li>
                                                    </ul>
                                               </td>

                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th colspan="6">TOTAL</th>
                                                <th>{{ number_format($total,0,',','.') }}</th>
                                                <th></th>

                                            </tr>

                                      </tbody>

                                    </table>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>




<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">


<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();

  });


</script>


@endsection
