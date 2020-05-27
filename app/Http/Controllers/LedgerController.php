<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Border;
class LedgerController extends Controller
{
    public function index(){
        $person = Border::paginate(20);
        return view('ledgers.index',['ledgers' => $person]);
    }

    public function store(Request $request){


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
      
        
        $person->save();

        return redirect('/ledgers');
    }

    public function dataAjax(Request $request)
    {
      $search = $request->search;

      if($search == ''){
         $locations = Border::orderby('border_name','asc')->select('id','border_name')->limit(5)->get();
      }else{
         $locations = Border::orderby('border_name','asc')->select('id','border_name')->where('border_name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($locations as $location){
         $response[] = array(
              "id"=>$location->border_name,
              "text"=>$location->border_name
         );
      }

      echo json_encode($response);
      exit;
    }
}
