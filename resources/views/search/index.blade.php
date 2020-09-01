@extends('layouts.app')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Busca de Pessoas</h3>
    </div>

    <div class="row box-body">
        <div class="col-md-12">

               
            <div class="row">
                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchName', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('nameSearch', null, ['placeholder' => 'Ex:Jose', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group ">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchEmail', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('E-mail') !!}
                            {!! Form::text('emailSearch', null, ['placeholder' => 'Ex:barbaraheloisearagao-99@ericsson.com ', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchPhone', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Telefone') !!}
                            {!! Form::text('phoneSearch', null, ['placeholder' => 'Ex:(11) 99111-1707', 'class' => 'form-control'] )!!}     
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

            </div>


            <hr>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchCpf', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('CPF') !!}
                            {!! Form::text('cpfSearch', null, ['placeholder' => 'Ex:835.113.942-44', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchCheckin', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Data de entrada') !!}
                            {!! Form::text('checkinSearch', null, ['placeholder' => 'Ex:11/12/2020', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title">Busca de veiculo</h3>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchModelCar', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Modelo') !!}
                            {!! Form::text('modelCarSearch', null, ['placeholder' => 'Ex:Santana', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchPlaca', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Placa') !!}
                            {!! Form::text('placeCarSearch', null, ['placeholder' => 'Ex:BYP-2545', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-4">
                    {!! Form::open(['url' => 'searchColor', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8', 'name' => 'formIndicators']) !!}
                        <div class="form-group">
                            {!! Form::label('Cor') !!}
                            {!! Form::text('colorCarSearch', null, ['placeholder' => 'Ex:Preto', 'class' => 'form-control'] )!!}     
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

</div>

@if(isset($indicators))



    <div class="box">
        
        
        <div class="box-header">
            <h3 class="box-title">Resultado das buscas</h3>
        </div>


        

        <div class="box-body table-responsive">
            
            <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Responsavel</th>
                        <th>Espaço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Quantidade Pessoas</th>
                        <th>Data de Entrada</th>
                        <th>Data de Saida</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($indicators as $value)

                    <tr>

                        <td> {{$value->id}} </td>

                        <td> {{$value->name}} </td>
                        
                        <td>
                            <?php
                                if($value->type == '1'){
                                    echo 'Barraca'; 
                                }
                                if($value->type == '2'){
                                    echo 'Trailer';
                                }
                                if($value->type == '3'){
                                    echo 'Saco de dormir';
                                }
                                if($value->type == '4'){
                                    echo 'Outros';
                                }
                            ?>
                        </td>

                        <td> {{$value->email}} </td>
                        
                        <td> {{$value->phone}} </td>
                        
                        <td> {{$value->qtdpeople}} </td>

                        <td> {{$value->checkin}} </td>

                        <td> {{$value->checkout}} </td>
                        
                        <td>
                            
                        @if(Auth::user()->profile_id !== 3)

                        
                            <div class="col-md-4">
                                <a href="{{ URL('/') }}/indicators/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-primary bgpersonalizado">
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                </a>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-4">                        
                                    <a href="{{ URL('/') }}/indicators/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ URL('/') }}/indicators/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-primary bgpersonalizado">
                                        <span class="glyphicon glyphicon-share-alt"></span>
                                    </a>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <form method="POST" action="{{ route('indicators.destroy', $value->id) }}" accept-charset="UTF-8">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash">
                                    </form>
                                </div>
                            </div>

                        @endif
                        


                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>


        </div>

    </div>

@endif
@endsection