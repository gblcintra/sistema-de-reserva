@extends('layouts.auth')

@section('content')

<div class="page-login">
    <main>
        <div>
            <div id="main-wrapper">
                <a href="{{ URL('/') }}" class="logo-name text-lg text-center"><img class="rounded mx-auto d-block img-fluid" src="{{ asset('images/divisor.png') }}" alt="{{ config('app.name', 'Laravel') }}"></a>
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            
                            @if (session('status'))
                               <p class="alert alert-success">{{ session('status') }}</p>
                            @endif

                            <p class="text-center m-t-md">Informe seu e-mail.</p>
                            <form class="m-t-md" role="form" method="POST" action="{{ url('/password/email') }}">

                                {{ csrf_field() }}
                                <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail"  required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Recuperar senha</button>
                            </form>

                            <p class="display-block text-center m-t-md text-sm">Já tem uma conta? <a href="{{ url('/') }}">Clique para acessar</a></p>

                            <p class="text-center m-t-xs text-sm"><?php echo date('Y') ?> &copy; {{ config('app.name', 'Laravel') }}.com</p>

                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
</div>
@endsection