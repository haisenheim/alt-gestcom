
@extends('layouts.admin')
@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-header">
                <h5 class="card-title">HISTORIQUE DES FACTURES</h5>
                <div class="float-right">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button data-target="#addFacture" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une facture"></i> Nouvelle facture</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>DATE</th>
                                    <th>&numero;</th>
                                    <th>CLIENT</th>
                                    <th>MONTANT</th>
                                    <th>VERSEMENT</th>
                                    <th>RESTE</th>
                                    <th>STATUT</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($factures as $fournisseur)
                                <tr>
                                    <td>{{ date_format($fournisseur->created_at,'d/m/Y H:i') }}</td>
                                    <td><a href="/admin/factures/{{ $fournisseur->id }}"> {{ $fournisseur->reference }}</a></td>
                                    <td>{{ $fournisseur->client?$fournisseur->client->name:$fournisseur->client_name }}</td>

                                    <td>{{ number_format($fournisseur->montant,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->versement,0,',','.') }}</td>
                                    <td>{{ number_format($fournisseur->reste,0,',','.') }}</td>
                                    <td><span class="badge badge-{{ $fournisseur->status['color'] }}">{{ $fournisseur->status['name'] }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $factures->links() }}
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFacture">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE FACTURE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            @csrf
          <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="form-group">
                    <select name="client_id" id="client_id" required class="form-control">
                        <option value=0>Client ...</option>
                        @foreach ($clients as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="text" placeholder="Pour les clients de passage: nom du client" id="name" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <select name="delai_id" id="delai_id"  class="form-control">
                        <option value=0>Paiement immediat </option>
                        @foreach ($delais as $type)
                            <option value="{{ $type->id }}">{{ $type->name }} jours</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="form-group">
                    <select name="article_id" id="article_id"  class="form-control">
                        <option value="">Article ...</option>
                        @foreach ($articles as $type)
                            <option data-pu="{{ $type->pv }}" value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <input type="number" id="pu" name="pu" placeholder="prix unitaire" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <input type="number" value="1" id="qty" name="qty" placeholder="quantite"  class="form-control">
                </div>
            </div>
            <div class="col-md-1 col-sm-12">
                <div class="form-group">
                    <button id="btn-add" class="btn btn-success"><i class="fa fa-plus-circle"></i></button>
                </div>
            </div>
          </div>
          <hr>
          <div class="table-responsive">
            <table id="tab" class="table table-sm table-condensed table-bordered table-striped">
                <thead class="table-dark">
                    <tr>

                        <th>DESIGNATION</th>
                        <th>PRIX UNITAIRE</th>
                        <th>QUANTITE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
            <div>
                <button class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
            </div>
      </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <style>
    .btn-remove{
        cursor: pointer;
    }
</style>
<script>
    $('#client_id').change(function(){
        var cli = $('#client_id').val();
        console.log(cli>0);
        if(cli>0){
            $('#name').prop('disabled',true);
        }else{
            $('#name').prop('disabled',false);
        }
    })
    var i=0;
    $('#article_id').change(function(){
        var pv = $('#article_id option:selected').data('pu');
        var text = $('#article_id option:selected').text();
        $('#pu').val(pv);
    });
    $('#btn-add').click(function(){
        var pv = $('#article_id option:selected').data('pu');
        var text = $('#article_id option:selected').text();
        var id = $('#article_id').val();
        var qty = $('#qty').val();
        i++;
        var tr=`<tr data-id=${id} data-pu=${pv} data-qty=${qty}><td>${text}</td><td>${pv}</td><td>${qty}</td><td><span class="btn-remove"><i class="fa fa-trash text-danger" title="Supprimer"></i></span></td></tr>`;
       //console.log(tr);
        $('#tab').find('tbody').append(tr);
        $('.btn-remove').click(function(){
            $(this).parent().parent().remove();
            i--;
        });
    });



    $('#btn-save').click(function(){
        var data = [];
        $('#tab').find('tbody>tr').each(function(){
            var elt ={};
            elt.id = $(this).data('id');
            elt.qty = $(this).data('qty');
            elt.pu = $(this).data('pu');
            data.push(elt);
        });
        console.log(data);
        $.ajax({
            url:'/admin/factures',
            type:'post',
            dataType:'json',
            data:{client_id:$('#client_id').val(),name:$('#name').val(),delai_id:$('#delai_id').val(),lignes:data,_token:$('input[name="_token"]').val()},
            success:function(data){
                window.location.replace('/admin/factures/'+data);
            },
            error:function(){
                alert("Une erreur est survenue lors de l'enregistrement veuillez reessayer!");
            }
        });
    });


</script>

@endsection
