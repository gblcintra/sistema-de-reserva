@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar reserva</h3>
    </div>

    {!! Form::open(['url' => 'indicators', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}

        <div class="box-body">
            <fieldset class="border border-primary">
                <legend>Dados do Usuario</legend>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Nome do responsável') !!}
                                {!! Form::text('name', null, ['placeholder' => 'Ex:Jose', 'class' => 'form-control'] )!!}
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('E-mail') !!}
                                {!! Form::text('email', null, ['class' => 'form-control ', 'placeholder'=>'Ex: nome@nomde.com.br']) !!}
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
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
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Telefone de Contato') !!}
                                {!! Form::tel('phone', null, ['class' => 'form-control ', 'placeholder'=>'ex: 016 99999-9999']) !!}
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('dataBirth') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Data de Nascimento') !!}
                                {!! Form::date('dataBirth', null, ['class' => 'form-control ', 'placeholder'=>'ex: 11/12/1999', 'required'=>'true']) !!}
                                <div class="text-danger">{{ $errors->first('dataBirth') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                            <div class="input text country">
                                {!! Form::label('Pais') !!}
                                {!! Form::select('country', [1 => 'Carregando'], null , ['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('country') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                            <div class="input text state">
                                {!! Form::label('Estado') !!}
                                {!! Form::select('stateanduf', [1 => 'Carregando'],1, ['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('state') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                            <div class="input text city">
                                {!! Form::label('Cidade') !!}
                                {!! Form::select('city', [1 => 'Carregando'], 1,['class' => 'form-control ']) !!}
                                <div class="text-danger">{{ $errors->first('city') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('cep') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Cep') !!}
                                {!! Form::text('cep', null, ['class' => 'form-control ', 'placeholder'=>'Ex. 0000-0000']) !!}
                                <div class="text-danger">{{ $errors->first('cep') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                                {!! Form::number('addressnumber', null, ['class' => 'form-control ', 'placeholder'=>'2358', 'min' =>'0']) !!}
                                <div class="text-danger">{{ $errors->first('addressnumber') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group {{ $errors->has('complementaddress') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Complemento') !!}
                                {!! Form::text('complementaddress', null, ['class' => 'form-control', 'placeholder'=>'Ap 44, bloco 2']) !!}
                                <div class="text-danger">{{ $errors->first('complementaddress') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                ], 1, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('Tipo de acomodação') !!}

                            <div class="input text">
                                <span> Motor Home : <input type="number" min='0' value="0" name="motorHome"></span>
                            </div>

                            <div class="input text">
                                <span>Kombi Home : <input type="number" min='0' value="0" name="KombiHome"></span>
                            </div>

                            <div class="input text">
                                <span>Barraca de teto : <input type="number" min='0' value="0" name="barracaTeto"></span>
                            </div>

                            <div class="input text">
                                <span>Barraca : <input type="number" min='0' value="0" name="barraca"></span>
                            </div>

                            <div class="input text">

                                
                            </div>
                            
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input text city">

                                <a href="{{asset('pdf/regulamento.pdf')}}" target="target">Ler Regulamento Camping</a> <br>
                                
                                <input type="checkbox" id="responsible" name="responsible" >
                                <label for="responsible">Li e concordo com os termos </label>
                                     
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
                                ], 1, ['class' => 'form-control qtdpeople']) !!}
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="people"></div>
                 <hr>


                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('checkin') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Dia de Entrada') !!}
                                {!! Form::date('checkin', null, ['class' => 'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('checkin') }}</div>
                                <div class="text-danger">{{ $errors->first('checkinError') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('checkout') ? 'has-error' : ''}}">
                            <div class="input text">
                                {!! Form::label('Previsão da Saída') !!}
                                {!! Form::date('checkout', null, ['class' => 'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('checkout') }}</div>
                                <div class="text-danger">{{ $errors->first('checkoutError') }}</div>
                            </div>
                        </div>
                    </div>
                 </div>

                
                 @if(Auth::user()->profile_id == 3)
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
                @endif

                
                    
                <div class="row">
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
                            {!! Form::text('phoneEmergency', null, ['class' => 'form-control', 'placeholder' => '(16) 9912324567', 'required' => 'true']) !!}
                            
                        </div>
                    </div>
                </div>

            </fieldset>

            <fieldset name="resume">
                <legend>Resumo Da Reserva</legend>
            </fieldset>
           

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group text-right ">
                        {!! Form::submit('Finalizar Reserva', ['class' => 'btn btn-primary bgpersonalizado', 'name' => 'final']) !!}
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
            

            <script>
                /*$('input[type="submit"]').click((event) =>{
                    event.preventDefault();
                    var space = $('.buttonCamp');
                    space.html('');

                    var btn1 = $('<button type="button" class="btn btn-primary" style="margin-right:5px">Pagar Agora</button>');
                    var btn2 = $('<button type="button" class="btn btn-info">Pagar Por Transferencia</button>');

                    space.append(btn1);
                    space.append(btn2);

                    btn2.click(()=> {
                        btn2.first().submit();
                    });
                })*/
            </script>
        </div>

    {!! Form::close() !!}

</div>
@endsection