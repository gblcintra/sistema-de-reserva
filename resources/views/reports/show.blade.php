@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Relatório #{{$reports->id}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Assunto') !!}
                        {!! Form::text('name', $reports->name, ['class' => 'form-control', 'disabled' => true, 'placeholder'=>'Ex: Troca de lampada']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Imagem') !!}
                        {!! Form::file('image', ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Descrição') !!}
                        {!! Form::text('description', $reports->description, ['class' => 'form-control', 'disabled' => true, 'placeholder'=>'Ex: Breve descrição do assunto']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('query', 'Observação') !!}
                        {!! Form::text('query', $reports->query, ['class' => 'form-control', 'disabled' => true, 'placeholder'=>'Ex: Observações relevantes']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('size', 'Quantidade') !!}
                        {!! Form::text('size', $reports->size, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-left">
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            <a href="javascript::void(0);" onclick="print();" class="btn btn-primary">Imprimir</a>
        </div>

    </div>

</div>

@endsection