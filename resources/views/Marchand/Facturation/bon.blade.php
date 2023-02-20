@extends('layouts.marchand')

@section('content')

    <div class="container">

        <div style="padding-top: 30px">
            <div class="">

                <!-- Main content -->
                <div id="printable" class="invoice p-3 mb-3">
                  <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <img style="object-fit: contain; width:100%; height:150px;"  src="http://staging.nyota-supports.com/img/fournisseurs/903ead8ead2774e6e467e0571919388208d52d2b.png" alt="">
                            </div>
                            <div style="width:80%">
                                <p><span style="font-weight: 800; font-size:2rem; color:#176046; float: right;" class="">by NYOTA</span></p>
                            </div>
                        </div>
                    </div>
                  <div class="text-center">
                        <div class="mt-4"><span style="font-size: 2.5rem;"><b>BON D'ACHAT</b></span></div>
                            <p><span style="color: #a0a0a0; font-size:1.2rem;">{{ $bon->name }}</span></p>
                            <div class="mt-4"><span style="font-size: 2.5rem;"><b>{{ $bon->client->name }}</b></span></div>
                            <p><span style="color: #a0a0a0; font-size:1.7rem;">{{ $bon->client->phone }}</span></p>

                            <div><img src="{{ asset('qrcodes/qrcode.svg') }}" alt=""></div>

                            <div class="mt-5">
                                <div class="text-center">
                                    <span style="font-size: 1.5rem; font-weight:900; font-family:'lobster-regular'">{{ $bon->client->first_name }}, à presenter à la caisse</span>
                                    <div class="mt-4">
                                        <p><span style="font-size: 3.5rem; font-weight:900;">{{ number_format($bon->montant,0,',','.') }} FCFA</span></p>
                                        <div class="mt-2">
                                            <p>Expire le</p>
                                            <p><span style="font-size: 1rem; font-weight:900; color:red">{{ date_format($bon->expired_at,'d/m/Y') }}</span></p>
                                        </div>
                                        <div style="max-width: 400px; border:#000 solid 3px; min-height:200px; margin: 50px auto" class="mt-4 text-center">
                                            <p><span style="font-size: 2rem; font-weight:900;">LA DIRECTION</span></p>
                                            <p><span style="color: #a0a0a0; font-size:1.3rem">Signature et Contact</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  </div>



                <!-- /.invoice -->

            </div>
        </div>
    </div>
    <div id="float-div">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a style="" title="Imprimer" id="btn-print" class="btn btn-warning btn-sm print"  href="#"><i style="color: #f0f6ff" class="fa fa-print"></i></a>
            </li>
            @if(!$bon->validated_at)
            <li class="list-inline-item">
                <a style="" title="Valider" class="btn btn-success btn-sm"  href="/marchand/bon/validate/{{ $bon->token }}"><i style="color: #f0f6ff" class="fa fa-check-circle"></i></a>
            </li>
            @endif
        </ul>

    </div>

    <style>
        #printable{
            max-width: 800px;
            margin: 2rem auto;
        }

        #float-div{
            position: fixed;
            top:20vh;
            right: 50px;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    </style>

    <script src="{{ asset('js/jquery.min-3.6.1.js') }}"></script>
    <script src="{{ asset('js/jQuery.print.js')}}"></script>

    <script>
        $('#btn-print').click(function(){
            $("#printable").print({
                addGlobalStyles : true,
                stylesheet : null,
                rejectWindow : true,
                noPrintSelector : ".no-print",
                iframe : true,
                append : null,
                prepend : null
            });
        });
    </script>

@endsection


