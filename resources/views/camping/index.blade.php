@extends('layouts.app') @section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Configurações Camping Capitolio</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['action' => 'CampingController@SeatLimit', 'class'=> 'form-inline']) !!}

                    {!! Form::label('seatLimit', 'Limite de vagas:', ['class' => 'color-blue']) !!}
                    {!! Form::number('seatLimit', $camping->seatLimit, ['class' => 'form-control', 'placeholder' => 'Limite de vagas']) !!}
                    
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                
                {!! Form::close() !!}
                <div>
                  <span>
                     Valor Antigo : {{ $camping->oldSeatLimit }}
                  </span>
                </div>
            </div>
        </div>  
        <hr>

        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['action' => 'CampingController@CurrentTariff', 'class'=> 'form-inline']) !!}

                    {!! Form::label('CurrentTariff', 'Valor da diaria atual:', ['class' => 'color-blue']) !!}
                    {!! Form::number('currentTariff', $camping->dailyValue, ['class' => 'form-control', 'placeholder' => 'Valor da diaria atual', 'step' =>'any']) !!}
                    
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                
                {!! Form::close() !!}
                <div>
                  <span>
                     Valor Antigo : {{ $camping->oldDailyValue }}
                  </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            
            <div class="col-md-4">
                {!! Form::label('ControlBracelets', 'Configurar cor das pulseiras', ['class' => 'color-blue']) !!}
                   
                {!! Form::open(['action' => 'CampingController@ControlBracelets']) !!}

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Dias da semana</th>
                        <th scope="col">Cor nova</th>
                        <th scope="col">Cor atual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Segunda feira</td>
                        <td><input type="color" name="colorMonday" id="colorMonday" value={{ $camping->colorMonday }}></td>
                        <td><canvas id="colorMondayCurrent"  style="background:{{ $camping->colorMonday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Terça feira</td>
                        <td><input type="color" name="colorTuesday" id="colorTuesday" value={{ $camping->colorTuesday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorTuesday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Quarta feira</td>
                        <td><input type="color" name="colorWednesday" id="colorWednesday" value={{ $camping->colorWednesday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorWednesday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Quinta feira</td>
                        <td><input type="color" name="colorThursday" id="colorThursday" value={{ $camping->colorThursday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorThursday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Sexta feira</td>
                        <td><input type="color" name="colorFriday" id="colorFriday" value={{ $camping->colorFriday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorFriday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Sabado</td>
                        <td><input type="color" name="colorSaturday" id="colorSaturday" value={{ $camping->colorSaturday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorSaturday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Domingo</td>
                        <td><input type="color" name="colorSunday" id="colorSunday" value={{ $camping->colorSunday }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorSunday }};"></canvas></td>
                      </tr>
                      <tr>
                        <td>Adicional</td>
                        <td><input type="color" name="colorOuther" id="colorOuther" value={{ $camping->colorOuther }}></td></td>
                        <td><canvas id="colorMondayCurrent"  style="background: {{ $camping->colorOuther }};"></canvas></td>
                      </tr>
                    </tbody>
                  </table>
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                
                {!! Form::close() !!}
            </div>
        </div>
         

      
    </div>

</div>

@endsection