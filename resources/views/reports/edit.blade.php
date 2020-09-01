@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar relatório</h3>
    </div>

    {!! Form::open(['url' => 'reports/$reports->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            {!! Form::hidden('id', $reports->id) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Assunto') !!}
                            {!! Form::text('name', $reports->name, ['class' => 'form-control', 'placeholder'=>'Ex: Troca de lampada']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Imagem') !!}
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Descrição') !!}
                            {!! Form::text('description', $reports->description, ['class' => 'form-control', 'placeholder'=>'Ex: Breve descrição do assunto']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('query', 'Observação') !!}
                            {!! Form::text('query', $reports->query, ['class' => 'form-control', 'placeholder'=>'Ex: Observações relevantes']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('size', 'Quantidade') !!}
                            {!! Form::select('size', [ 
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
                            ], $reports->size, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection