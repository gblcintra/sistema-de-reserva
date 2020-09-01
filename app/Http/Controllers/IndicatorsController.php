<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;
use Redirect;
use Session;

use \App\Logs;
use \App\Permissions;
use \App\Indicators;
use \App\User;
use \App\Companions;
use \App\Http\Requests\StoreIndicators;

class IndicatorsController extends Controller
{
    public function index(Request $request)
    {
        $logged = Auth::user();
        $userLoggedProfileId = $logged->profile_id;

        if (Permissions::permissaoModerador($logged)) {
            $indicators = Indicators::all();
        } else {
            $indicators = Indicators::where('c_auth', $logged->id)->get();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de reservas'));

        return view('indicators.index', [
            'indicators' => $indicators,
            'userLoggedProfileId' => $userLoggedProfileId
        ]);
    }

    public function create()
    {
        return view('indicators.add');
    }

    public function store(Request $request)
    {

        if (Auth::user()->profile_id == 3) {
            $validate = Validator::make(
                $request->all(),
                [
                    "name" => "required",
                    //"surname" => "required",
                    "cpf" => "required",
                    "email" => "required",
                    "qtdpeople" => "required",
                    "phone" => "required",
                    "city" => "required",
                    "stateanduf" => "required",
                    "country" => "required",
                    "cep" => "required",
                    "address" => "required",
                    "addressnumber" => "required",
                    // "complementaddress"=> "required",
                    "modelcar" => "required",
                    "placa" => "required",
                    "color" => "required",
                    "type" => "required",
                    "checkin" => "required",
                    "checkout" => "required"
                ],
                [
                    'name.required' => 'Por Favor Digite o Nome',
                    'surname.required' => 'Por Favor Digite o Nome',


                    'qtdpeople.required' => 'Por favor selecionar uma quantidade de pessoas',
                    //'qtdpeople.integer' => 'Por favor a quantidade de pessoas tem que ser um numero',

                    'phone.required' => 'Por favor digite o numero de telefone',
                    'phone.integer' => 'O telefone tem de ser um numero',

                    'city.required' => 'Por favor preencher o nome da cidade',
                    'stateanduf.required' => 'Por favor preencher o nome do estado',
                    'cep.required' => 'Por favor preencher o cep',

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

                    'checkout.required' => 'Por favor preencher a data de checkout',
                    'checkout.date' => 'Esse campo é do tipo date'

                ]
            );
        } else {
            $validate = Validator::make(
                $request->all(),
                [
                    "name" => "required",
                    //"surname" => "required",
                    "cpf" => "required",
                    "email" => "required",
                    "qtdpeople" => "required",
                    "phone" => "required",
                    "city" => "required",
                    "stateanduf" => "required",
                    "country" => "required",
                    "cep" => "required",
                    "address" => "required",
                    "addressnumber" => "required",
                    // "complementaddress"=> "required",


                    "checkin" => "required",
                    "checkout" => "required"
                ],
                [
                    'name.required' => 'Por Favor Digite o Nome',
                    'surname.required' => 'Por Favor Digite o Nome',


                    'qtdpeople.required' => 'Por favor selecionar uma quantidade de pessoas',
                    //'qtdpeople.integer' => 'Por favor a quantidade de pessoas tem que ser um numero',

                    'phone.required' => 'Por favor digite o numero de telefone',
                    'phone.integer' => 'O telefone tem de ser um numero',

                    'city.required' => 'Por favor preencher o nome da cidade',
                    'stateanduf.required' => 'Por favor preencher o nome do estado',
                    'cep.required' => 'Por favor preencher o cep',

                    'address.required' => 'Por favor preencher o endereço',
                    'addressinteger.required' => 'Por favor preencher o numero do endereço',
                    'addressinteger.integer' => 'Este campo é um numero',




                    'cpf.required' => 'Por favor preencher o CPF',
                    'cpf.integer' => 'O Cpf tem que ser um numero',

                    'email.required' => 'Por favor preencher o email',
                    'email.email' => 'Esse campo é do tipo email',

                    'checkin.required' => 'Por favor preencher a data de checkin',
                    'checkin.date' => 'Esse campo é do tipo date',

                    'checkout.required' => 'Por favor preencher a data de checkout',
                    'checkout.date' => 'Esse campo é do tipo date'

                ]
            );
        }
        if ($validate->fails()) {

            return Redirect::back()->withErrors($validate)->withInput();
        } else {
            try {
                $data = $request->all();

                $indicators = new Indicators();

                $quantityPeople = isset($data['peopleValue']) ? $data['peopleValue'] : null;

                //$nameFullArray = [ $data['name'] , $data['surname'] ];
                //$nameFull = implode(" ", $nameFullArray);

                // $indicators->name_full = $nameFull;
                $indicators->name = $data['name'];
                //$indicators->sur_name = $data['surname'];
                $indicators->phone = $data['phone'];
                $indicators->city = $data['city'];

                $dataBirth = $this->convertDataRequestForm($request->dataBirth);

                $indicators->dateBirth = $dataBirth;
                $stateAndUf = $data['stateanduf'];
                $stateAndUfArray = explode("-", $stateAndUf);
                $count = count($stateAndUfArray);
                //dd($count);
                if ($count > 1) {
                    $state = $stateAndUfArray[1];
                    $uf = $stateAndUfArray[0];

                    $indicators->state = $state;
                    $indicators->uf = $uf;
                } else {
                    $state = $stateAndUfArray[0];

                    $indicators->state = $state;
                    $indicators->uf = ".n";
                }

                $coutryAndUf = $data['country'];
                $coutryAndUfArray = explode("-", $coutryAndUf);
                $country = $coutryAndUfArray[1];
                $indicators->country = $country;

                $indicators->cep = $data['cep'];
                $indicators->address = $data['address'];
                $indicators->addressnumber = $data['addressnumber'];


               
                $date = $request->dataBirth;
                // dd($data);
                // Separa em dia, mês e ano
                list($dia, $mes, $ano) = explode('-', $date);
            
                // Descobre que dia é hoje e retorna a unix timestamp
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            
                // Depois apenas fazemos o cálculo já citado :)
                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                $idade = intval($idade);
               
                $indicators->age = $idade;

                if ($idade >= 0 && $idade < 8) {
                    $indicators->free = 1;
                }
                if ($idade > 7 && $idade < 12) {
                    $indicators->sock = 1;
                }
                if ($idade > 11) {
                    $indicators->entire = 1;
                }
    

                
                if ($request->complementaddress == null) {
                    $indicators->complementaddress = 'N/D';
                } else {
                    $indicators->complementaddress = $data['complementaddress'];
                }

                $indicators->qtdpeople = $request->qtdpeople;

                if (isset($data['modelcar']) == false) {
                    $indicators->modelcar = null;
                } else {
                    $indicators->modelcar = $data['modelcar'];
                }

                if (isset($data['placa']) == false) {
                    $indicators->placa = null;
                } else {
                    $indicators->placa = $data['placa'];
                }

                if (isset($data['color']) == false) {
                    $indicators->color = null;
                } else {
                    $indicators->color = $data['color'];
                }

                if (isset($data['type']) == false) {
                    $indicators->type = null;
                } else {
                    $indicators->type = $data['type'];
                }

                if ($request->has('phoneEmergency')) {
                    $indicators->phoneEmergency = $request->phoneEmergency;
                } else {
                    $indicators->phoneEmergency = null;
                }

                if ($request->has('responsible')) {
                    $indicators->responsible = $request->responsible;
                } else {
                    $indicators->responsible = null;
                }


                $indicators->motorHome = $request->motorHome;
                $indicators->KombiHome  = $request->KombiHome;
                $indicators->barracaTeto = $request->barracaTeto;
                $indicators->barraca = $request->barraca ;

               


                $indicators->cpf = $request->cpf;
                $indicators->email = $request->email;

                $checkinAfterFilter =  $this->convertDataRequestForm($request->checkin);
                if ($checkinAfterFilter == null) {
                    $validate->errors()->add('checkinError', 'O valor Do checkin esta invalida');
                }

                $checkoutAfterFilter =  $this->convertDataRequestForm($request->checkout);

                if ($checkoutAfterFilter == null) {
                    $validate->errors()->add('checkoutError', 'O valor Do checkout esta invalida');
                }

                if ($validate->errors()->messages()) {
                    return Redirect::back()->withErrors($validate)->withInput();
                }

                if ($checkinAfterFilter < $checkoutAfterFilter) {
                    $indicators->checkin = $checkinAfterFilter;
                    $indicators->checkout = $checkoutAfterFilter;
                } else {
                    Session::flash('flash_error', "Erro ao cadastrar reserva!, dia de Checkin deve ser menor que o dia de checkout");
                    return Redirect::back()->withErrors($validate)->withInput();
                }

                $indicators->user_id = Auth::user()->id;

                $indicators->c_auth = Auth::user()->id;

                if ($quantityPeople != null && $quantityPeople > 1) {

                    try {
                        $nameCompanionString = null;
                        $cpfCompanionString = null;
                        $companionBirthString = null;

                        $nameCompanionArray = [];
                        $cpfCompanionArray = [];
                        $companionBirthArray = [];

                        for ($x = 1; $x < $quantityPeople; $x++) {
                            $y = $x - 1;

                            $nameCompanionString = "nameCompanion-" . $x;
                            $cpfCompanionString = "cpfCompanion-" . $x;
                            $companionBirthString = "companionBirth-" . $x;

                            $nameCompanionArray[$y] = $request->$nameCompanionString;
                            $cpfCompanionArray[$y] = $request->$cpfCompanionString;
                            $companionBirthArray[$y] = $request->$companionBirthString;
                        }
                    } catch (Exception $e) {
                        Session::flash('flash_error', "Erro ao cadastrar reserva!");
                    }
                }

                for ($x = 1; $x < $quantityPeople; $x++) {
                    $y = $x - 1;


                    $companions = new Companions();
                    $companions->name_responsible = $data['name'];
                    $companions->cpf_responsible = $data['cpf'];
                    $companions->name = $nameCompanionArray[$y];
                    $companions->cpf = $cpfCompanionArray[$y];
                    $companions->birth = $companionBirthArray[$y];

                    $date = $companionBirthArray[$y];
   
                    // Separa em dia, mês e ano
                    list($ano, $mes, $dia) = explode('-', $date);
                
                    // Descobre que dia é hoje e retorna a unix timestamp
                    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                    // Descobre a unix timestamp da data de nascimento do fulano
                    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
                
                    // Depois apenas fazemos o cálculo já citado :)
                    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                    $idade = intval($idade);
                   
                    $companions->age = $idade;
                    
    
                    if ($idade >= 0 && $idade < 8) {
                        $companions->free = 1;
                    }
                    if ($idade > 7 && $idade < 12) {
                        $companions->sock = 1;
                    }
                    if ($idade > 11) {
                        $companions->entire = 1;
                    }
        
    
                    
                    $companions->save();
                }
                $indicators->paymentValue = $request->inputCash;
                $indicators->save();

                Session::flash('flash_success', "Reserva cadastrada com sucesso!");

                Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou uma reserva: ' . $indicators->name));
            } catch (Exception $e) {
                Session::flash('flash_error', "Erro ao cadastrar reserva!");
            }

            return Redirect::to('/indicators');
        }
    }


    public function show($id)
    {

        $indicators = Indicators::find($id);
        $userCpf = $indicators->cpf;

        $companions = Companions::where('cpf_responsible', $userCpf)->get();

        $result = count($companions) < 1 ? null : count($companions);

        if ($result == null) {
            //dd($indicators , $companions);
            return view('indicators.show', [
                'indicators' => $indicators,

            ]);
        } else {

            
            return view('indicators.show', [
                'indicators' => $indicators,
                'companions' => $companions
            ]);
        }
    }

    public function edit($id)
    {
        $indicatorsId = $id;

        $userIdAuthenticated = Auth::id();
        $userQuery = User::where('id', $userIdAuthenticated)->first();
        $userProfileId = $userQuery->profile_id;

        if ($userProfileId == 1) {
            $indicatorsQuery = Indicators::where('user_id', '=', $userIdAuthenticated)->where('id', '=', $indicatorsId)->first();
            if ($indicatorsQuery == null) {
                $errosLogIndicators = Indicators::where('id', '=', $indicatorsId)->first();

                if ($errosLogIndicators == null) {
                    Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' Tentou alterar Uma reserva que não existe : ' . $indicatorsId));
                    return redirect('/');
                }

                Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' Tentou alterar Uma reserva que não lhe refere. id da reserva id : ' . $indicatorsId . ', cliente : ' . $errosLogIndicators->name));
                return redirect('/');
            }

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' Tentou alterar Uma reserva porem não tem permissao para fazer alteracoes. id da reserva id : ' . $indicatorsId));
            Session::flash('flash_error', "Erro ao editar reserva!");

            return redirect('/indicators');
        } else {
            if ($userProfileId == 2) {
                $indicatorsQuery = Indicators::find($indicatorsId);

                return view('indicators.edit', [
                    'indicators' => $indicatorsQuery,
                ]);
            } else {
                if ($userProfileId == 3) {
                    $indicatorsQuery = Indicators::find($indicatorsId);

                    //dd($indicatorsQuery);
                    return view('indicators.edit', [
                        'indicators' => $indicatorsQuery,
                    ]);
                }
            }
        }
    }

    public function update(Request $request, $id)
    {

        $validate = Validator::make(
            $request->all(),
            [
                "name" => "required",
                //"surname" => "required",
                "cpf" => "required",
                "email" => "required",
                "qtdpeople" => "required",
                "phone" => "required",
                "city" => "required",
                "stateanduf" => "required",
                "country" => "required",
                "cep" => "required",
                "address" => "required",
                "addressnumber" => "required",
                // "complementaddress"=> "required",
                "modelcar" => "required",
                "placa" => "required",
                "color" => "required",
                "type" => "required",
                "checkin" => "required",
                "checkout" => "required"
            ],
            [
                'name.required' => 'Por Favor Digite o Nome',
                'surname.required' => 'Por Favor Digite o Nome',


                'qtdpeople.required' => 'Por favor selecionar uma quantidade de pessoas',
                //'qtdpeople.integer' => 'Por favor a quantidade de pessoas tem que ser um numero',

                'phone.required' => 'Por favor digite o numero de telefone',
                'phone.integer' => 'O telefone tem de ser um numero',

                'city.required' => 'Por favor preencher o nome da cidade',
                'stateanduf.required' => 'Por favor preencher o nome do estado',
                'cep.required' => 'Por favor preencher o cep',

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

                'checkout.required' => 'Por favor preencher a data de checkout',
                'checkout.date' => 'Esse campo é do tipo date'

            ]
        );

        if ($validate->fails()) {

            return Redirect::back()->withErrors($validate)->withInput();
        } else {
            try {

                $data = $request->all();


                $indicators = Indicators::find($id);

                $quantityPeople = isset($data['peopleValue']) ? $data['peopleValue'] : null;

                //$nameFullArray = [ $data['name'] , $data['surname'] ];
                //$nameFull = implode(" ", $nameFullArray);

                // $indicators->name_full = $nameFull;

                $indicators->name = $data['name'];
                //$indicators->sur_name = $data['surname'];
                $indicators->phone = $data['phone'];
                $indicators->city = $data['city'];


                $date = $request->dataBirth;
                // dd($data);
                // Separa em dia, mês e ano
                list($dia, $mes, $ano) = explode('-', $date);
            
                // Descobre que dia é hoje e retorna a unix timestamp
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            
                // Depois apenas fazemos o cálculo já citado :)
                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                $idade = intval($idade);
               
                $indicators->age = $idade;

                if ($idade >= 0 && $idade < 8) {
                    $indicators->free = 1;
                }
                if ($idade > 7 && $idade < 12) {
                    $indicators->sock = 1;
                }
                if ($idade > 11) {
                    $indicators->entire = 1;
                }
    
                $stateAndUf = $data['stateanduf'];

                $stateAndUfArray = explode("-", $stateAndUf);

                $count = count($stateAndUfArray);

                //dd($count);
                if ($count > 1) {
                    $state = $stateAndUfArray[1];
                    $uf = $stateAndUfArray[0];

                    $indicators->state = $state;
                    $indicators->uf = $uf;
                } else {
                    $state = $stateAndUfArray[0];

                    $indicators->state = $state;
                    $indicators->uf = "n";
                }

                $coutryAndUf = $data['country'];
                $coutryAndUfArray = explode("-", $coutryAndUf);

                $country = $coutryAndUfArray[0];
                $indicators->country = $country;

                $indicators->cep = $data['cep'];
                $indicators->address = $data['address'];
                $indicators->addressnumber = $data['addressnumber'];

                if ($data['complementaddress'] == null) {
                    $indicators->complementaddress = 'N/D';
                } else {
                    $indicators->complementaddress = $data['complementaddress'];
                }

                $indicators->qtdpeople = $data['qtdpeople'];
                if ($request->has('responsible')) {
                    $indicators->responsible = $request->responsible;
                } else {
                    $indicators->responsible = null;
                }

                $indicators->modelcar = $data['modelcar'];
                $indicators->placa = $data['placa'];
                $indicators->color = $data['color'];
                $indicators->type = $data['type'];
                $indicators->cpf = $data['cpf'];
                $indicators->email = $data['email'];

                $checkinAfterFilter =  $this->convertDataRequestForm($data['checkin']);
                if ($checkinAfterFilter == null) {
                    $validate->errors()->add('checkinError', 'O valor Do checkin esta invalida');
                }

                $checkoutAfterFilter =  $this->convertDataRequestForm($data['checkout']);

                if ($checkoutAfterFilter == null) {
                    $validate->errors()->add('checkoutError', 'O valor Do checkout esta invalida');
                }

                if ($validate->errors()->messages()) {
                    return Redirect::back()->withErrors($validate)->withInput();
                }

                if ($checkinAfterFilter < $checkoutAfterFilter) {
                    $indicators->checkin = $checkinAfterFilter;
                    $indicators->checkout = $checkoutAfterFilter;
                } else {
                    Session::flash('flash_error', "Erro ao cadastrar reserva!, dia de Checkin deve ser menor que o dia de checkout");
                    return Redirect::back()->withErrors($validate)->withInput();
                }

                $indicators->user_id = Auth::user()->id;

                $indicators->c_auth = Auth::user()->id;

                if ($quantityPeople != null && $quantityPeople > 1) {

                    try {
                        $nameCompanionString = null;
                        $cpfCompanionString = null;
                        $companionBirthString = null;

                        $nameCompanionArray = [];
                        $cpfCompanionArray = [];
                        $companionBirthArray = [];

                        for ($x = 1; $x < $quantityPeople; $x++) {
                            $y = $x - 1;

                            $nameCompanionString = "nameCompanion-" . $x;
                            $cpfCompanionString = "cpfCompanion-" . $x;
                            $companionBirthString = "companionBirth-" . $x;

                            $nameCompanionArray[$y] = $data[$nameCompanionString];
                            $cpfCompanionArray[$y] = $data[$cpfCompanionString];
                            $companionBirthArray[$y] = $data[$companionBirthString];
                        }
                    } catch (Exception $e) {
                        Session::flash('flash_error', "Erro ao cadastrar reserva!");
                    }
                }

                for ($x = 1; $x < $quantityPeople; $x++) {
                    $y = $x - 1;


                    $companions = new Companions();
                    $companions->name_responsible = $data['name'];
                    $companions->cpf_responsible = $data['cpf'];
                    $companions->name = $nameCompanionArray[$y];
                    $companions->cpf = $cpfCompanionArray[$y];
                    $companions->birth = $companionBirthArray[$y];

                    $date = $companionBirthArray[$y];
   
                    // Separa em dia, mês e ano
                    list($ano, $mes, $dia) = explode('-', $date);
                
                    // Descobre que dia é hoje e retorna a unix timestamp
                    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                    // Descobre a unix timestamp da data de nascimento do fulano
                    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
                
                    // Depois apenas fazemos o cálculo já citado :)
                    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                    $idade = intval($idade);
                   
                    $companions->age = $idade;
                    
    
                    if ($idade >= 0 && $idade < 8) {
                        $companions->free = 1;
                    }
                    if ($idade > 7 && $idade < 12) {
                        $companions->sock = 1;
                    }
                    if ($idade > 11) {
                        $companions->entire = 1;
                    }
                    $companions->save();
                }
                $indicators->paymentValue = $request->inputCash;

                $dataBirth = $this->convertDataRequestForm($request->dataBirth);

                $indicators->dateBirth = $dataBirth;
                $indicators->save();
                Session::flash('flash_success', "Reserva cadastrada com sucesso!");

                Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou uma reserva: ' . $indicators->name));
            } catch (Exception $e) {
                Session::flash('flash_error', "Erro ao cadastrar reserva!");
            }

            return Redirect::to('/indicators');
        }
    }

    public function destroy($id)
    {
        $userLogged = Auth::user();

        $userProfileId = $userLogged->profile_id;
        if ($userProfileId == 1) {
            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' Tentou apagar uma reserva mas nao tem permissao'));
            Session::flash('flash_error', "Erro ao apagar reserva!");
            return redirect('/indicators');
        } else {
            try {

                $indicators = Indicators::find($id);

                if ($indicators) {

                    $indicators->delete();

                    Session::flash('flash_success', "Reserva excluída com sucesso!");

                    Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o reserva ID: ' . $id));
                } else {
                    Session::flash('flash_error', "Reserva não encontrada!");
                }
            } catch (\Illuminate\Database\QueryException $e) {

                Session::flash('flash_error', 'Não é possível excluir esta reserva!');
            } catch (Exception $e) {

                Session::flash('flash_error', "Erro ao excluir reserva!");
            }
        }
        return Redirect::to('/indicators');
    }

    private function convertDataRequestForm($dataRequested, $dateFormated = '-')
    {

        if (strlen($dataRequested) >= 8 && strlen($dataRequested) <= 10) {
            if (!strstr($dataRequested, '-')) {
                if (strstr($dataRequested, '/')) {
                    $dataArray =  explode("/", $dataRequested);

                    $year = $dataArray[0];
                    $month = $dataArray[1];
                    $day = $dataArray[2];

                    $dataConvert = [$year, $month, $day];

                    $dateFormated = implode('-', $dataConvert);
                    return $dateFormated;
                } else {

                    $dataArray = str_split($dataRequested, 2);
                    $arrayYear = [$dataArray[2], $dataArray[3]];

                    $day = $dataArray[0];
                    $month = $dataArray[1];
                    $year = implode('', $arrayYear);

                    $dataConvert = [$year, $month, $day];

                    $dateFormated = implode('-', $dataConvert);
                    return $dateFormated;
                }
            } else {
                $dateFormated = $dataRequested;
            }
        } else {
            // funcao de erro para valores passados errados e menores que 7
            return null;
        }

        return $dateFormated;
    }

    public function paymentStatus($id)
    {
        $indicators = new Indicators;
        $data = $indicators::find($id);
        $data->paymentStatus = !$data->paymentStatus;
        $data->save();

        return redirect()->back();
    }
}
