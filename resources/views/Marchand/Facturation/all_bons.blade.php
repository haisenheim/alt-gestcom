@extends('layouts.marchand')



@section('content')

    <div style="" class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title">HISTORIQUE DES BONS D'ACHAT</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm data-table">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>CLIENT</th>
                                <th>MONTANT</th>
                                <th>EXPIRATION</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bons as $bon)
                                <tr>
                                    <td>{{ $bon->name }}</td>
                                    <td><a href="/marchand/bon-achat/{{ $bon->token }}">{{ $bon->client->name }}</a></td>
                                    <td>{{ number_format($bon->montant,0,',','.') }}</td>
                                    <td>{{ date_format($bon->expired_at,'d/m/Y') }}</td>
                                    <th><span class="badge badge-{{ $bon->status['color'] }}">{{ $bon->status['name'] }}</span></th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $('#bons').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
</script>

@endsection


