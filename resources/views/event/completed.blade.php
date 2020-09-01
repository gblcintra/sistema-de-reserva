<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ URL('/') }}/favicon.ico"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CapitólioCamping') }}</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dataTables.tableTools.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    
    
    <link rel="stylesheet" href="{{ asset('css/capcamp.css') }}" rel="stylesheet">
    
    <script type="text/javascript" src="{{ asset('js/jquery-2.0.3.min.js') }}"></script>

</head>

<body class="skin-blue">

<div class="container">

    
    <div class="box">

        <div class="box-header">
        <h3 class="box-title">Reserva Numero:{{$indicators->id}}</h3>
        </div>
    
        <?php


            // 2020-02-29
            function ConverteData($data){
                $dataExplode = explode('-' , $data);

                $dataExplode = [$dataExplode[2],$dataExplode[1], $dataExplode[0]];
                $dataImplode = implode('/', $dataExplode);

                return $dataImplode;
            }
            
            $checkin =  ConverteData($indicators->checkin);
            $checkout =  ConverteData($indicators->checkout);
            $dataBirth = ConverteData($indicators->dateBirth);
        ?>
    
            <div class="box-body">

                <div>
                    <h4>Para confirmar a reserva, é necessário depositar ou transferir metade do valor.</h4>
                    <h4>Dados para depósito:</h4>
                    <h4>Banco 341 - Itaú</h4>
                    <h4>Agência: 5247</h4>
                    <h4>C/C: 00915-1</h4>
                    <h4>Titular: Francisca Rodrigues da Costa</h4>
                    <h4>CPF: 770.664.136-87</h4>
                    <h4>Atencao: enviar o comprovante para o Whatsap: 37 99865 2667</h4>
                    <h4>O restante do pagamento deverá ser feito no check in</h4>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">Nome : {{$indicators->name}}</li>
                    <li class="list-group-item">Telephone : {{$indicators->phone}}</li>
                    
                    <li class="list-group-item">Cpf : {{$indicators->cpf}}</li>
                    <li class="list-group-item">Email : {{$indicators->email}}</li>
                    <li class="list-group-item">dateBirth : {{$dataBirth}}</li>

                    <li class="list-group-item">Data de Entrada : {{$checkin}}</li>
                    <li class="list-group-item">Data de Saida : {{$checkout}}</li>

                    <li class="list-group-item">Cidade : {{$indicators->city}}</li>
                    <li class="list-group-item">Estado : {{$indicators->state}}</li>
                    <li class="list-group-item">Pais : {{$indicators->country}}</li>

                   
                    

                    <li class="list-group-item">Cep : {{$indicators->cep}}</li>
                    <li class="list-group-item">Endereço : {{$indicators->address}}</li>
                    <li class="list-group-item">Numero da casa : {{$indicators->addressnumber}}</li>
                    <li class="list-group-item">Complemento : {{$indicators->complementaddress}}</li>


                    <li class="list-group-item">Quantidade de pessoas : {{$indicators->qtdpeople}}</li>

                    <li class="list-group-item">Telephone de Emergência : {{$indicators->phoneEmergency}}</li>

                    <li class="list-group-item">Motor Home : {{$indicators->motorHome}}</li>
                    <li class="list-group-item">Kombi Home : {{$indicators->KombiHome}}</li>
                    <li class="list-group-item">Barraca de Teto : {{$indicators->barracaTeto}}</li>
                    <li class="list-group-item">Barraca : {{$indicators->barraca}}</li>

                  </ul>
                  <div>
                  <h3> Valor total: R${{$indicators->paymentValue}}</h3>

                  </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button onclick="print()">Imprimir</button>
                </div>
            </div>
            </div>
    
    </div>
</div>
<footer class="footer">© <?php echo date('Y') ?> - Todos os direitos reservados</footer>
<script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.maskMoney.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.tableTools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/maskInputForm.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ajax.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validate.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>


<script type="text/javascript" src="{{ asset("js/calc.js") }}"></script>

<script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>







<script type="text/javascript">
    
    var base = "{{ URL('/') }}";
    var controller = "{{ explode('/', Route::current()->uri)[0] }}";

   

</script>

<script src="{{ asset('js/capcamp.js') }}"></script>


</body>
</html>
