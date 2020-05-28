<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Border;
use App\Location;
class LedgerController extends Controller
{
    public function index(){
        $person = Border::paginate(20);
        return view('ledgers.index',['ledgers' => $person]);
    }

    public function store(Request $request){

        $place = new Location();
        $person = new Border();
        $validate = $request->validate([
            'age' => ['required', 'integer']
        ]);
        $person->fname = request('fname');
        $person->lname = request('lname');
        $person->age = request('age');
        $person->id_number = request('id_number');
        $person->id_type = request('id_type');
        $person->mode_of_transpo = request('mode_of_transpo');
        $person->vplatenum = request('vplatenum');
        $person->purpose = request('purpose');
        $person->destination = request('destination');
        $person->border_name = request('border_name');
        $person->path = request('path');
      
        Location::firstOrCreate([
            'location' => $person->border_name
        ]);
        
        $person->save();

        return redirect('/ledgers');
    }

    public function dataAjax(Request $request)
    {
      $search = $request->search;

      if($search == ''){
         $locations = Location::orderby('location','asc')->select('id','location')->limit(5)->get();
      }else{
         $locations = Location::orderby('location','asc')->select('id','location')->where('location', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($locations as $location){
         $response[] = array(
              "id"=>$location->location,
              "text"=>$location->location
         );
      }

      echo json_encode($response);
      exit;
    }
}
