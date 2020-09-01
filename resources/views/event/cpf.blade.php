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
        <h3 class="box-title">Digite o Numero do seu Cpf</h3>
        </div>
    
        
            <div class="box-body">
                {!! Form::open(['url' => 'event/cpf', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                <div class="row">
                        <div class="col-md-6">
                            
                                <div class="input text">
                                    {!! Form::label('Seu Cpf') !!}
                                    {!! Form::text('cpf', null, ['class' => 'form-control ', 'placeholder'=>'CPF','required' => 'true']) !!}
                                    
                                </div>

                                
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
    
                        <div class="form-group text-right ">
                            {!! Form::submit('Buscar Cpf', ['class' => 'btn btn-primary bgpersonalizado', ]) !!}
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="buttonCamp">
            
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
    
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.maskMoney.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>



<script type="text/javascript">
    
    var base = "{{ URL('/') }}";
    var controller = "{{ explode('/', Route::current()->uri)[0] }}";

   

</script>

<script src="{{ asset('js/capcamp.js') }}"></script>


</body>
</html>
