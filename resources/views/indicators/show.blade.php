@extends('layouts.app') @section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Reserva #{{$indicators->id}}</h3>
        
    </div>

    <div class="box-body">

         <div class="box-body">
             <div class="row">
                 <div class="col-md-6">
                    <h4>Status do pagamento : <?php 
                        if($indicators->paymentStatus == '0')
                        { echo 'Não aprovado';}
                        if($indicators->paymentStatus == '1')
                        { echo 'Aprovado';}
                    ?></h4>
                    <h3>Valor da Reserva R$ {{$indicators->paymentValue}}</h3>
                 </div>
             </div>
            <fieldset class="border border-primary">
                <legend>Dados do Usuario</legend>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input text">
                            {!! Form::label('Nome do responsável') !!}
                            {!! Form::text('name', $indicators->name, ['placeholder' => 'Ex:Jose', 'class' => 'form-control', 'disabled' => 'true'] )!!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input text">
                            {!! Form::label('E-mail') !!}
                            {!! Form::text('email', $indicators->email, ['class' => 'form-control ', 'placeholder'=>'Ex: nome@nomde.com.br', 'disabled' => 'true']) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                            <div class="input text">
                            {!! Form::label('CPF') !!}
                            {!! Form::text('cpf', $indicators->cpf, ['class' => 'form-control ', 'placeholder'=>'Ex: 615.471.547-45', 'disabled' => 'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input text">
                            {!! Form::label('Telefone de Contato') !!}
                            {!! Form::tel('phone', $indicators->phone, ['class' => 'form-control ', 'placeholder'=>'ex: 016 99999-9999', 'disabled' => 'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="input text country">
                            {!! Form::label('Pais') !!}
                            {!! Form::text('country', $indicators->country, ['class' => 'form-control ', 'disabled' => 'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input text state">
                            {!! Form::label('Estado') !!}
                            {!! Form::text('stateanduf', $indicators->state, ['class' => 'form-control ', 'disabled' => 'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input text city">
                            {!! Form::label('Cidade') !!}
                            {!! Form::text('city', $indicators->city ,['class' => 'form-control ', 'disabled' => 'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="input text">
                            {!! Form::label('Cep') !!}
                            {!! Form::text('cep', $indicators->cep, ['class' => 'form-control ', 'placeholder'=>'Ex. 0000-0000', 'disabled' => 'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input text">
                            {!! Form::label('Endereço') !!}
                            {!! Form::text('address', $indicators->address, ['class' => 'form-control ', 'placeholder'=>'Rua Goias', 'disabled' => 'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input text">
                            {!! Form::label('Numero') !!}
                            {!! Form::number('addressnumber', $indicators->addressnumber, ['class' => 'form-control ', 'placeholder'=>'2358', 'min' =>'0', 'disabled' => 'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input text">
                            {!! Form::label('Complemento') !!}
                            {!! Form::text('complementaddress', $indicators->complementaddress, ['class' => 'form-control', 'placeholder'=>'Ap 44, bloco 2', 'disabled' => 'true']) !!}
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
                                    {!! Form::text('qtdpeople', $indicators->qtdpeople, ['class' => 'form-control', 'disabled' => 'true']) !!}
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="people">
                        @isset($companions)
                        <table class="table table-striped  table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">cpf</th>
                                    <th scope="col">Data de nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companions as $key => $companionss)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $companions[$key]->name }}</td>
                                        <td>{{ $companions[$key]->cpf }}</td>
                                        <td>{{ $companions[$key]->birth }}</td>
                                    </tr>
                                @endforeach
                                
                               
                            </tbody>
                        </table>
                       

                        @endisset
                    
                     </div>
    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input text">
                                {!! Form::label('Moodelo do Veiculo') !!}
                                {!! Form::text('modelcar', $indicators->modelcar, ['class' => 'form-control', 'placeholder'=>'Ex: Fusca', 'disabled' => 'true']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input text">
                                {!! Form::label('Placa do Veiculo') !!}
                                {!! Form::text('placa', $indicators->placa, ['class' => 'form-control', 'placeholder' => 'Ex: BYP-5358', 'disabled' => 'true']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input text">
                                {!! Form::label('Cor do Veiculo') !!}
                                {!! Form::text('color', $indicators->color, ['class' => 'form-control', 'placeholder' => 'Ex: Azul', 'disabled' => 'true']) !!}
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
                                       
                                    ], $indicators->type, ['class' => 'form-control', 'disabled'=> 'true']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input text">
                                {!! Form::label('Dia de Entrada') !!}
                                {!! Form::date('checkin', $indicators->checkin, ['class' => 'form-control', 'disabled' => 'true']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('checkout') ? 'has-error' : ''}}">
                                <div class="input text">
                                    {!! Form::label('Previsão da Saída') !!}
                                    {!! Form::date('checkout', $indicators->checkout, ['class' => 'form-control', 'disabled' => 'true']) !!}
                                </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input text">
                            {!! Form::label('Numero de emergência') !!}
                            {!! Form::text('phoneEmergency', $indicators->phoneEmergency, ['class' => 'form-control','disabled' => 'true']) !!}
                            
                        </div>
                    </div>
                </div>
                </fieldset>
    
                



        <div class="form-group text-left">
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            <a href="javascript::void(0);" onclick="print();" class="btn btn-primary">Imprimir</a>
        </div>

    </div>

</div>
@if(Auth::user()->profile_id == 3)
<div class="box">

    <div class="box-header">
        <h3 class="box-title">Resumo da Reserva</h3>
        
    </div>

    <div class="box-body" style="font-size:18px">
        <?php
        
        $free = 0;
        $sock = 0;
        $entire = 0;

        if($indicators->free == 1){
            $free = $free+1;
        }

        if($indicators->sock == 1){
            $sock = $sock+1;
        }

        if($indicators->entire == 1){
            $entire = $entire+1;
        }


       if(isset($companions)){
        foreach($companions as $key => $companionss){
            

            if($companions[$key]->free == 1){
             $free = $free+1;
            }

            if($companions[$key]->sock == 1){
                $sock = $sock+1;
            }

            if($companions[$key]->entire == 1){
                $entire = $entire+1;
            }
       }
               
        }
        

        ?>
         <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    Numero de Pessoas:
                    <ul>
                    <li>Adultos : {{$free}}</li>
                    <li>Crianças de 8 a 11 anos : {{$sock}}</li>
                    <li>Crianças de 0 a 7 anos : {{$entire}}</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Data de Entrada:  {{$indicators->checkin}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Data de Saida:  {{$indicators->checkout}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Cor da Pulseira:  <canvas id="bracelet"></canvas> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Quantidade de Espaços:
                    <ul>
                        <li>Barracas : </li>
                        <li>Traillers : </li>
                        <li>Motor Homes</li>
                        <li>Barracas Veiculares</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                   Sinal: 
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Descontos: 
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Valor a Receber: R$ {{$indicators->paymentValue}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Registro de Pagamento :
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Acrescentar Pagamento :
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    Encerrar checkin :
                </div>
            </div>




         </div>

    </div>

</div>
@endif

@endsection