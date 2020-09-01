@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar Reserva</h3>
    </div>

    {!! Form::open(['url' => 'indicators/'.$indicators->id, 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}
   
        <div class="box-body">
            <fieldset class="border border-primary">
                <legend>Dados do Usuario</legend>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Nome do responsável') !!}
                                {!! Form::text('name', $indicators->name, ['placeholder' => 'Ex:Jose', 'class' => 'form-control'] )!!}
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('E-mail') !!}
                                {!! Form::text('email', $indicators->email, ['class' => 'form-control ', 'placeholder'=>'Ex: nome@nomde.com.br']) !!}
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('cpf') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('CPF') !!}
                                {!! Form::text('cpf', $indicators->cpf, ['class' => 'form-control ', 'placeholder'=>'Ex: 615.471.547-45']) !!}
                                <div class="text-danger">{{ $errors->first('cpf') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Telefone de Contato') !!}
                                {!! Form::tel('phone', $indicators->phone, ['class' => 'form-control ', 'placeholder'=>'ex: 016 99999-9999']) !!}
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('dataBirth') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Data de Nascimento') !!}
                                {!! Form::date('dataBirth', $indicators->dataBirth, ['class' => 'form-control ', 'placeholder'=>'ex: 11/12/1999', 'required'=>'true']) !!}
                                <div class="text-danger">{{ $errors->first('dataBirth') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('cep') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Cep') !!}
                                {!! Form::text('cep', $indicators->cep, ['class' => 'form-control ', 'placeholder'=>'Ex. 0000-0000']) !!}
                                <div class="text-danger">{{ $errors->first('cep') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Endereço') !!}
                                {!! Form::text('address', $indicators->address, ['class' => 'form-control ', 'placeholder'=>'Rua Goias']) !!}
                                <div class="text-danger">{{ $errors->first('address') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group {{ $errors->has('addressnumber') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Numero') !!}
                                {!! Form::number('addressnumber', $indicators->addressnumber, ['class' => 'form-control ', 'placeholder'=>'2358', 'min' =>'0']) !!}
                                <div class="text-danger">{{ $errors->first('addressnumber') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('complementaddress') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Complemento') !!}
                                {!! Form::text('complementaddress', $indicators->complementaddress, ['class' => 'form-control', 'placeholder'=>'Ap 44, bloco 2']) !!}
                                <div class="text-danger">{{ $errors->first('complementaddress') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                            <div class="input text country">
                                {!! Form::label('Pais') !!}
                                {!! Form::text('country', $indicators->country , ['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('country') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                            <div class="input text state">
                                {!! Form::label('Estado') !!}
                                {!! Form::text('stateanduf', $indicators->state, ['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('state') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                            <div class="input text city">
                                {!! Form::label('Cidade') !!}
                                {!! Form::text('city', $indicators->city,['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('city') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input text city">
                                <input type="checkbox" name="responsible" id="responsible"  checked={{$indicators->responsible}}  aria-label="Checkbox for following text input">
                                {!! Form::label('Sou responsavel pela reserva') !!}
                                     
                            </div>
                        </div>
                    </div>
                </div>

                

            </fieldset>

            <fieldset>
                <legend>Dados da Reserva</legend>
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
                                ], $indicators->qtdpeople, ['class' => 'form-control qtdpeople']) !!}
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="people"></div>
                
                @if(Auth::user()->profile_id == 3)
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('modelcar') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Moodelo do Veiculo') !!}
                                {!! Form::text('modelcar', $indicators->modelcar, ['class' => 'form-control', 'placeholder'=>'Ex: Fusca']) !!}
                                <div class="text-danger">{{ $errors->first('modelcar') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('placa') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Placa do Veiculo') !!}
                                {!! Form::text('placa', $indicators->placa, ['class' => 'form-control', 'placeholder' => 'Ex: BYP-5358']) !!}
                                <div class="text-danger">{{ $errors->first('placa') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Cor do Veiculo') !!}
                                {!! Form::text('color', $indicators->color, ['class' => 'form-control', 'placeholder' => 'Ex: Azul']) !!}
                                <div class="text-danger">{{ $errors->first('color') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input text">
                                {!! Form::label('Tipo de Espaço') !!}
                                {!! Form::select('type', [ 
                                    1 => 'Barraca',
                                    2 => 'Trailer',
                                    3 => 'Motor home',
                                    4 => 'Outros',
                                ], $indicators->type, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('checkin') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Dia de Entrada') !!}
                                {!! Form::date('checkin', $indicators->checkin, ['class' => 'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('checkin') }}</div>
                                <div class="text-danger">{{ $errors->first('checkinError') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('checkout') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Previsão da Saída') !!}
                                {!! Form::date('checkout', $indicators->checkout, ['class' => 'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('checkout') }}</div>
                                <div class="text-danger">{{ $errors->first('checkoutError') }}</div>
                            </div>
                        </div>
                    </div>

                    
                    
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input text">
                                        <button type="button" class="btn btn-primary" name="calcular">Calcular Valor</button>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->profile_id == 3)
                                <div class="col-md-6">
                                    <div id="colorBraceletDiv">
                                        <span>Cor da pulseira</span>
                                        <canvas id="colorBracelet"></canvas>
                                    </div>
                                </div>
                            @endif
                        </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input text">
                            {!! Form::label('Numero de emergência') !!}
                            {!! Form::text('phoneEmergency', $indicators->phoneEmergency, ['class' => 'form-control', 'placeholder' => '(16) 9912324567', 'required' => 'true']) !!}
                            
                        </div>
                    </div>
                </div>

            </fieldset>

            <fieldset name="resume">
                <legend>Resumo Da Reserva</legend>
                
            </fieldset>
           


            <div class="form-group text-right">
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection