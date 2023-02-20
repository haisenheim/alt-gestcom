
@extends('layouts.marchand')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-center">PARAMETRES</h1>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="container parametres text-center">
        <div style="min-width: 300px" class="text-center">
            <div class="">
                <form method="POST" action="/marchand/parametres">
                    @csrf
                    <div class="form text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Montant min. d'un bon d'achat</label>
                                    <input type="number" name="min_bon_achat" value="{{ $frn->min_bon_achat }}">
                                </div>
                                <p>Détermine le montant du cashback minimum pour obtenir un bon d'achat </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Pourcentage du cashback</label>
                                    <input type="number" name="percent" value="{{ $frn->percent }}">
                                </div>
                                <p>Détermine le montant du cashback crédité sur les carte de fidélité </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Validité d'un bon d'achat</label>
                                    <input type="number" name="validite_bon_achat" value="{{ $frn->validite_bon_achat }}">
                                </div>
                                <p>Détermine le délai d'utilisation d'un bon d'achat </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-block btn-save">Enregistrer les parametres</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
  </div>

  <style>
    div.form{
        width: 600px;
        margin: 10px auto;
    }
    form>.form>div.card{
        max-width: 600px;
        height: 100px;
    }
    .btn-save{
        background-color: #1199EE;
        color: #ffffff;
    }
  </style>
@endsection
