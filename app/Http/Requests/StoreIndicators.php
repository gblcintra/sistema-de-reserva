<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicators extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "cpf"=> "required",
            "email"=> "required",
            "qtdpeople"=> "required",
            "phone"=> "required",
            "city"=> "required",
            "state"=> "required",
            "country"=> "required",
            "address"=> "required",
            "addressnumber"=> "required",
            "complementaddress"=> "required",
            "modelcar"=> "required",
            "placa"=> "required",
            "color"=> "required",
            "type"=> "required",
            "checkin"=> "required",
            "checkout"=> "required"

            /*
                variaveis para uso fututo 

                name
                qtdpeople 
                phone 
                city
                state
                address
                addressinteger
                complementaddress
                modelcar
                placa
                color
                type
                cpf
                email
                checkin
                checkout

            */
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Por Favor Digite o Nome',

        'qtdpeople.required' => 'Por favor selecionar uma quantidade de pessoas',
        //'qtdpeople.integer' => 'Por favor a quantidade de pessoas tem que ser um numero',

        'phone.required' => 'Por favor digite o numero de telefone',
        'phone.integer' => 'O telefone tem de ser um numero',

        'city.required' => 'Por favor preencher o nome da cidade',
        'state.required' => 'Por favor preencher o nome do estado',
        'address.required' => 'Por favor preencher o endereço',

        'addressinteger.required' => 'Por favor preencher o numero do endereço',
        'addressinteger.integer' => 'Este campo é um numero',

        'modelcar.required' => 'Por favor preencher o Modelo do carro',
        'placa.required' => 'Por favor preencher o numero da placa',
        'color.required' => 'Por favor preencher a cor do veiculo',
        'type.required' => 'Por favor preencher o tipo do veiculo',

        'cpf.required' => 'Por favor preencher o CPF',
        'cpf.integer' => 'O Cpf tem que ser um numero',

        'email.required' => 'Por favor preencher o email',
        'email.email' => 'Esse campo é do tipo email',

        'checkin.required' => 'Por favor preencher a data de checkin',
        'checkin.date' => 'Esse campo é do tipo date',

        'checkout.required' => 'Por favor preencher o date de checkout',
        'checkout.date' => 'Esse campo é do tipo date'
    ];
}
}
