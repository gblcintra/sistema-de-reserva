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
    
  <header class="header">
    <a href="{{ URL('/') }}" class="logo bgpersonalizado"><!-- <img src="{{ asset('images/CapCamping.png') }}" alt="{{ config('app.name', 'CapitólioCamping') }}" width="80">-->{{ config('app.name', 'CapitólioCamping') }}</a>
    <nav class="navbar navbar-static-top bgpersonalizado" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i>
                        <span> <i class="caret"></i>
                        </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ URL('/') }}/perfil" class="btn btn-default btn-flat">Editar perfil</a>
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            <ul id="menu" class="sidebar-menu">
            
            <?php
                // Foi usada essa forma para lidar com o menu 
                // Em todas as view
                // Ate o momento nao foi possivel usar o menu de forma dinamica entre
                // Os controller, neste menu tem uma regra de negocio que define quais
                // Botoes serao renderizados para cada tipo de usuario
                // Quando colocado no HomeController ele funciona no index,
                // Porem quando e chamado outro controller a view perde os dados e o menu
                // Quebra a view , esse foi o motivo pelo qual foi criado o menuClass
                // Esta sendo instanciado diretamente na view para nao perder os dados 
                // Ate encontramos uma forma de colocalo no controller novamente

                use \App\Classes\MenuClass;
                $menu = new MenuClass();
                $menus = $menu->Menu();
            ?>

            @foreach($menus as $itensMenus)
                <li id="{{ $itensMenus['name'] }}">
                    <a href="{{ URL('/')}}/{{ $itensMenus['identifier'] }}">
                        <i class="{{ $itensMenus['class'] }}"></i>
                        <span>{{ $itensMenus['name'] }}</span>
                    </a>
                </li>
            @endforeach
                
            </ul>
        </section>
    </aside>


        <aside class="right-side">

            @if(Session::has('flash_success'))
                <div class="pad margin no-print">
                    <div class="alert alert-success" style="margin-bottom: 0!important;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon fa fa-check"></i>
                        <b>{{ Session::get('flash_success') }}</b>
                    </div>
                </div>
            @endif

            @if(Session::has('flash_error'))
                <div class="pad margin no-print">
                    <div class="alert alert-danger" style="margin-bottom: 0!important;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon fa fa-check"></i>
                        <b>{{ Session::get('flash_error') }}</b>
                    </div>
                </div>
            @endif

            <section class="content">

                @yield('content')

            </section>

        </aside>

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
