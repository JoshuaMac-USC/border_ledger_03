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
        if(empty(request('age_out'))){
            $validate = $request->validate([
                'age' => ['required','numeric'],
            ],[
                'age.numeric' => 'Invalid Input'
            ]);
            $person->age = request('age');
        }else{
            $validate = $request->validate([
                'age_out' => ['required','numeric']
            ],[
                'age_out.numeric' => 'Invalid Input',
            ]);
            $person->age = request('age_out');
        }

/*
        $person->age = request('age');
        if(empty($person->age)){
            $person->age = request('age_out');
        }
*/
        $person->fname = request('fname');
        $person->lname = request('lname');
        $person->id_number = request('id_number');
        $person->id_type = request('id_type');
        $person->mode_of_transpo = request('mode_of_transpo');
        $person->vplatenum = request('vplatenum');
        $person->purpose = request('purpose');
        $person->destination = request('destination');
        $person->border_name = request('border_name');
        $person->path = request('path');
      
        Location::firstOrCreate([
            'location_name' => $person->border_name
        ]);
        
        $person->save();

        return redirect('/ledgers')->with('message','your message');
    }

    public function dataAjax(Request $request)
    {
      $search = $request->search;

      if($search == ''){
         $locations = Location::orderby('location_name','asc')->select('id','location_name')->limit(5)->get();
      }else{
         $locations = Location::orderby('location_name','asc')->select('id','location_name')->where('location_name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($locations as $location){
         $response[] = array(
              "id"=>$location->location_name,
              "text"=>$location->location_name
         );
      }

      echo json_encode($response);
      exit;
    }
}
