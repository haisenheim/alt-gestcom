
@extends('layouts.admin')
@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-header">
                <h5 class="card-title">HISTORIQUE DES FACTURES FOURNISSEURS</h5>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>DATE</th>
                                    <th>&numero;</th>
                                    <th>FOURNISSEUR</th>
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
        var pv = $('#pu').val();
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
