<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;

use \App\Logs;
use App\Camping;

class CampingController extends Controller
{

    public function Index(){
        $camping = Camping::find(1);
        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a pagina de configuracao do camping'));
        return view('camping.index', ['camping' => $camping]);
    }

    public function SeatLimit(Request $request){
        try{
            $camping = Camping::find(1);

            $camping->oldSeatLimit = $camping->seatLimit;
            $camping->seatLimit = $request->seatLimit;
            
            $camping->save();

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' alterou o a capacidade limite do camping'));
            Session::flash('flash_success', "Capacidade alterada com sucesso");
            return Redirect::back();

        }catch(Exception $e){
            Session::flash('flash_error', "Erro ao alterar limite de pessoas");
            return Redirect::back();
        }
    }

    public function CurrentTariff(Request $request){
        try{
            $camping = Camping::find(1);

            $camping->olddailyValue = $camping->dailyValue;
            $camping->dailyValue = $request->currentTariff;

            $camping->save();

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' alterou o valor da tarifa'));
            Session::flash('flash_success', "Valor da diaria alterado com sucesso");
            return Redirect::back();

        }catch(Exception $e){
            Session::flash('flash_error', "Erro ao alterar valor da tarifa");
            return Redirect::back();
        }
    }

    public function ControlBracelets(Request $request){
        try{
            $camping = Camping::find(1);

        $camping->colorMonday = $request->colorMonday;
        $camping->colorTuesday = $request->colorTuesday;
        $camping->colorWednesday = $request->colorWednesday;
        $camping->colorThursday = $request->colorThursday;
        $camping->colorFriday = $request->colorFriday;
        $camping->colorSaturday = $request->colorSaturday;
        $camping->colorSunday = $request->colorSunday;
        $camping->colorOuther = $request->colorOuther;

        $camping->save();
        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' alterou as cores das pulseiras'));
        Session::flash('flash_success', "Cores alteradas com sucesso");
            return Redirect::back();
        }catch(Exception $e){
            Session::flash('flash_error', "Erro ao alterar Cores");
            return Redirect::back();
        }
    }


    
}
