<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicators;

class SearchController extends Controller
{
    public function Index(Request $request){
        return view('search.index');
        
   }



    public function SearchName(Request $request){
        if ($request->filled('nameSearch')) {
            $returnSearch = $this->search('name',$request->nameSearch);
            
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }

    public function SearchEmail(Request $request){
        if ($request->filled('emailSearch')) {
            $returnSearch = $this->search('email',$request->emailSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }

    public function SearchPhone(Request $request){
        if ($request->filled('phoneSearch')) {
            $returnSearch = $this->search('phone',$request->phoneSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }
    
    public function SearchModelCar(Request $request){
        if ($request->filled('modelCarSearch')) {
            $returnSearch = $this->search('modelCar',$request->modelCarSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }
    
    public function SearchPlaca(Request $request){
        if ($request->filled('placeCarSearch')) {
            $returnSearch = $this->search('placa',$request->placeCarSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }
    
    public function SearchColor(Request $request){
        if ($request->filled('colorCarSearch')) {
            $returnSearch = $this->search('color',$request->colorCarSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }

    public function SearchCpf(Request $request){
        if ($request->filled('cpfSearch')) {
            $returnSearch = $this->search('cpf',$request->cpfSearch);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }
    
    
    

    public function SearchCheckin(Request $request){
        if ($request->filled('checkinSearch')) {
            $checkin =  $this->formatDate($request->checkinSearch);
            //dd($checkin);
            $returnSearch = $this->search('checkin',$checkin);
            return view('search.index', ['indicators' => $returnSearch]);
        }
    }
    
    private function search($column , $prop){
        $indicators = new Indicators;
        
        
        $result = $indicators->where($column, 'like', "%".$prop."%")->get();
        return $result;
    }

    private function formatDate($date){
        $dateExplode = explode("/", $date);
        $dateExplode = [$dateExplode[2],$dateExplode[0],$dateExplode[1]];
        $dateImplode = implode("-", $dateExplode);
        return $dateImplode;
    }

}