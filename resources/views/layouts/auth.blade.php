<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>{{ config('app.name', 'CapitólioCamping') }}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/x-icon" href="{{ URL('/') }}/favicon.ico"/>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link href="{{ URL('/') }}/css/modern.min.css" rel="stylesheet" type="text/css"/>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <style>
            body{
                background: #F1F4F9;
            }
            
        </style>
        
    </head>
    
    <body>

        @yield('content')

    </body>
</html>