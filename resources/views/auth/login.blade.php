<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ALT GESTCOM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="ALT GESTCOM By Alliages Technologies" name="description" />
        <meta content="ALT GESTCOM" name="Clement ESSOMBA" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('img/logo-alt.png') }}">

        <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
        <style>
            body{
                background: #f9faf9;
                background: linear-gradient(to right, #43a8ed,#a1d6f9,#FFFFFF,#43a8ed);
            }

        </style>

    </head>

    <body class="">

        <div class="account-pages my-5 pt-1">
            <div class="container">

                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="" style="background: transparent; border: none">
                            <div class="card-body p-4">
                                 <div class="text-center mb-2">
                                    <a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" height="120" alt="logo"></a>
                                    <h5 class="font-size-24 font-bold mb-2" style="margin-top:20px; font-weight: 900; color : #32cbfe">ALT GESTCOM</h5>
                                    <div class="text-center">
                                        <span style="font-size: 12px; color:#cc6600; font-weight:600; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">GESTION COMMERCIALE PAR ALLIAGES TECHNOLOGIES</span>
                                    </div>
                                </div>

                                <div class="p-2">

                                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                         {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <input type="text" name="username" class="form-control" id="email" placeholder="Saisir votre identifiant">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <input name="password" type="password" class="form-control" id="password" placeholder="Saisir votre mot de passe">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Se souvenir de moi</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Se Connecter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->
        <div style="position: fixed; bottom: 20px; height: 90px; width: 100%; text-align: center;">
           <span style="color: #cc6600; font-style:italic">By</span>
           <img src="<?= asset('img/logo-alt.png') ?>" height="90" alt=""/>
        </div>

    </body>
</html>
