@extends('layouts.app')

@section('content')

<div class="box">
    
    
    <div class="box-header">
        <h3 class="box-title">Reservas</h3>
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
                                echo 'Motor home';
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
                    
                    @if($userLoggedProfileId != 3)
                        <div class="col-md-3">
                            <a href="{{ URL('/') }}/indicators/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-primary bgpersonalizado">
                                <span class="glyphicon glyphicon-share-alt"></span>
                            </a>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-3">                        
                                <a href="{{ URL('/') }}/indicators/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ URL('/') }}/indicators/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-primary bgpersonalizado">
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                </a>
                            </div>
                            
                            
                            <div class="col-md-3">
                                <form method="POST" action="{{ route('indicators.destroy', $value->id) }}" accept-charset="UTF-8">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash">
                                </form>
                            </div>

                            <div class="col-md-3">
                                {!! Form::open(['action' => ['IndicatorsController@paymentStatus', $value->id], 'method' => 'post']) !!}
                    
                                    {!! csrf_field() !!}
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja validar o pagamento?')" class="btn btn-warning glyphicon glyphicon-usd">
                                {!! Form::close() !!}
                            </div>
                        </div>

                    @endif
                    


                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <br><br>

        <div class="form-group text-right">
            <a href="{{ URL('/') }}/indicators/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection