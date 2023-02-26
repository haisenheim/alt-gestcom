@extends('layouts.admin')



@section('content')

    <div style="padding-top: 30px; max-width:800px;" class="container">
        <div class="">

            <!-- Main content -->
            <div id="invoice" class="invoice p-3 mb-3">

                <div>
                    @csrf
                    <input type="hidden" name="" id="facture_id" value="{{ $facture->id }}">
                    <div class="row">
                      <div class="col-md-8 col-sm-12">
                          <div class="form-group">
                              <select name="client_id" id="client_id" required class="form-control">
                                  <option value="">Client ...</option>
                                  @foreach ($clients as $type)
                                      <option value="{{ $type->id }}">{{ $type->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
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
                </div>

              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                    <table id="tab" class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>

                                <th>DESIGNATION</th>
                                <th>PU</th>
                                <th>QUANTITE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($facture->lignes as $ligne)
                                    <tr data-id={{ $ligne->article_id }} data-pu={{ $ligne->pu }} data-qty={{ $ligne->quantite }}>
                                       <td>{{ $ligne->article?$ligne->article->name:'-' }}</td>
                                       <td>{{ number_format($ligne->pu,0,',','.') }}</td>
                                       <td>{{ number_format($ligne->quantite,0,',','.') }}</td>
                                       <td><span class="btn-cancel"><i class="fa fa-trash text-danger" title="Supprimer"></i></span></td></td>
                                    </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div>
                    <button class="btn btn-sm btn-success" id="btn-save">Enregistrer</button>
                </div>

              </div>

            <!-- /.invoice -->
        </div>
    </div>
    </div>
    <script>
        var i=0;
        $('#article_id').change(function(){

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

        $('.btn-cancel').click(function(){
                $(this).parent().parent().remove();
                i--;
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
                url:'/admin/factures/save',
                type:'post',
                dataType:'json',
                data:{client_id:$('#client_id').val(),facture_id:$('#facture_id').val(),delai_id:$('#delai_id').val(),lignes:data,_token:$('input[name="_token"]').val()},
                success:function(data){
                    window.location.replace('/admin/factures/'+data);
                },
                error:function(){
                    alert("Une erreur est survenue lors de l'enregistrement veuillez reessayer!");
                }
            });
        });
    </script>
    <style>
        div.content{
            background-color: #eeeeee;
        }
    </style>

@endsection


