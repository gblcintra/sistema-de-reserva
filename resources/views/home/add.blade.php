@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Reserva</h3>
    </div>

    {!! Form::open(['url' => 'indicators', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Nome do Responsavel') !!}
                               {!! Form::text('name', null, ['placeholder' => 'Ex:Jose dos Reis', 'class' => 'form-control '] )!!}
                               <div class="text-danger">{{ $errors->first('name') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Email') !!}
                               {!! Form::text('email', null, ['class' => 'form-control ', 'placeholder'=>'Ex: nome@nomde.com.br']) !!}
                               <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('cpf') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('CPF') !!}
                               {!! Form::text('cpf', null, ['class' => 'form-control ', 'placeholder'=>'Ex: 615.471.547-45']) !!}
                               <div class="text-danger">{{ $errors->first('cpf') }}</div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Quantidade de Pessoas') !!}
                            {!! Form::select('qtdpeople', [ 
                                1 => 1,
                                2 => 2,
                                3 => 3,
                                4 => 4,
                                5 => 5,
                                6 => 6,
                                7 => 7,
                                8 => 8,
                                9 => 9,
                                10 => 10,
                                11 => 11,
                                12 => 12,
                                13 => 13,
                                14 => 14,
                                15 => 15,
                                16 => 16,
                                17 => 17,
                                18 => 18,
                                19 => 19,
                                20 => 20,
                                21 => 21,
                                22 => 22,
                                23 => 23,
                                24 => 24,
                                25 => 25
                            ], 1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Telefone de Contato') !!}
                            {!! Form::tel('phone', null, ['class' => 'form-control ', 'placeholder'=>'ex: 016 99999-9999']) !!}
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Pais') !!}
                            {!! Form::text('country', null, ['class' => 'form-control ', 'placeholder' => 'Pais']) !!}
                            <div class="text-danger">{{ $errors->first('country') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Estado') !!}
                            {!! Form::text('state', null, ['class' => 'form-control ', 'placeholder' => 'Estado']) !!}
                            <div class="text-danger">{{ $errors->first('state') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Cidade') !!}
                            {!! Form::text('city', null, ['class' => 'form-control ', 'placeholder'=>'Cidade']) !!}
                            <div class="text-danger">{{ $errors->first('city') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Endereço') !!}
                            {!! Form::text('address', null, ['class' => 'form-control ', 'placeholder'=>'Rua Goias']) !!}
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group {{ $errors->has('addressnumber') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Numero') !!}
                            {!! Form::text('addressnumber', null, ['class' => 'form-control ', 'placeholder'=>'2358']) !!}
                            <div class="text-danger">{{ $errors->first('addressnumber') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('complementaddress') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Complemento') !!}
                            {!! Form::text('complementaddress', null, ['class' => 'form-control', 'placeholder'=>'Rua Goias']) !!}
                            <div class="text-danger">{{ $errors->first('complementaddress') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('modelcar') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Moodelo do Veiculo') !!}
                            {!! Form::text('modelcar', null, ['class' => 'form-control', 'placeholder'=>'Ex: Fusca']) !!}
                            <div class="text-danger">{{ $errors->first('modelcar') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('placa') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Placa do Veiculo') !!}
                            {!! Form::text('placa', null, ['class' => 'form-control', 'placeholder' => 'Ex: BYP-5358']) !!}
                            <div class="text-danger">{{ $errors->first('placa') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Cor do Veiculo') !!}
                            {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Ex: Azul']) !!}
                            <div class="text-danger">{{ $errors->first('color') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Tipo de Espaço') !!}
                            {!! Form::select('type', [ 
                                1 => 'Barraca',
                                2 => 'Trailer',
                                3 => 'Saco de dormir',
                                4 => 'Outros',
                            ], 1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('checkin') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Dia da CheckIn') !!}
                            {!! Form::date('checkin', null, ['class' => 'form-control']) !!}
                            <div class="text-danger">{{ $errors->first('checkin') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('checkout') ? 'has-error' : ''}}">
                        <div class="input text">
                            {!! Form::label('Dia da CheckOut') !!}
                            {!! Form::date('checkout', null, ['class' => 'form-control']) !!}
                            <div class="text-danger">{{ $errors->first('checkout') }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group text-right">
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection