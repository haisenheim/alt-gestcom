
@extends('layouts.admin')


@section('content')
  <div class="container">
        <div class="card card-light">
            <div class="card-header">
                <h5>EXTRACTIONS</h5>
                <form action="/admin/extractions" class="form-inline" method="get">
                    <div class="form-group">
                        <select name="type_id" id="type_id" class="form-control">
                            <option value="">TYPE</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="prestataire_id" id="prestataire_id" class="form-control">
                            <option value="">PRESTATAIRE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="prestation_id" id="prestation_id" class="form-control">
                            <option value="">ACTE ..</option>
                            @foreach ($actes as $acte)
                                <option value="{{ $acte->id }}">{{ $acte->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="entreprise_id" id="entreprise_id" class="form-control">
                            <option value="">CLIENT</option>
                            @foreach ($entreprises as $entr)
                                <option value="{{ $entr->id }}">{{ $entr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="exercice_id" id="exercice_id" class="form-control">
                            <option value="">EXERCICE</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <select name="assure_id" id="assure_id" class="form-control">
                            <option value="">ASSURE PRINCIPAL</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <select name="courtier_id" id="courtier_id" class="form-control">
                            <option value="">COURTIER</option>
                            @foreach ($courtiers as $entr)
                                <option value="{{ $entr->id }}">{{ $entr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="from" type="date" placeholder="DU" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="to" type="date" placeholder="AU" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-download"></i> EXTRAIRE</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>#</th>
                                    <th>CLIENT</th>
                                    <th>ASSURE</th>
                                    <th>PRESTATAIRE</th>
                                    <th>PRESTATION</th>
                                    <th>MONTANT</th>
                                </tr>
                        </thead>
                        <tbody>
                            @if(isset($consommations))
                            @foreach ($consommations as $consommation)
                                <tr>
                                    <td>{{ date_format($consommation->created_at,'d/m/Y H:i') }}</td>
                                    <td>{{ $consommation->assure?$consommation->assure->entreprise?$consommation->assure->entreprise->name:'Carte prepayee':'-' }}</td>
                                    <td>{{ $consommation->assure?$consommation->assure->name:'-' }}</td>
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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>

  <script>
    $('#type_id').change(function(){
        var id = $('#type_id').val();
        $.ajax({
            url:'/json/type/prestataires/'+id,
            type:'get',
            dataType:'json',
            success:function(data){
                //console.log(data);
                $('#prestataire_id').html('');
                var html = '<option value=0>PRESTATAIRE...</option>';
                data.forEach(element => {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                $('#prestataire_id').html(html);
            },
            error:function(){

            }
        });
    });

    $('#entreprise_id').change(function(){
        var id = $('#entreprise_id').val();
        $.ajax({
            url:'/json/entreprise/assures/'+id,
            type:'get',
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#assure_id').html('');
                $('#exercice_id').html('');
                var html = '<option>ASSURE...</option>';
                var html2 = '<option>EXERCICE...</option>';
                var agents = Object.entries(data.agents);
                var exercices = Object.entries(data.exercices);
                console.log(exercices);
                agents.forEach(element => {
                    html += `<option value="${element[1].id}">${element[1].first_name} ${element[1].last_name}</option>`;
                });
                exercices.forEach(el => {
                    html2 += `<option value="${el[1].id}">${el[1].periode}</option>`;
                });
                $('#assure_id').html(html);
                $('#exercice_id').html(html2);
            },
            error:function(){

            }
        });
    });
  </script>
  <!-- /.modal -->
@endsection
