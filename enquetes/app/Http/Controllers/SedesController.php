<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Sedes;
use App\Http\Requests\SedesRequest;

class SedesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Sedes::orderBy('Sede')->get();

        $editSede = Sedes::find($id);

        if(empty($editSede)){
            return view('administracao.sedes')->with(['listagem' => $listagem, 'sede' => $editSede]);
        }

        return view('administracao.sedes')->with(['listagem' => $listagem, 'sede' => $editSede]);
    }

    public function addSede(SedesRequest $request, $id){

        if($id == 0){
            Sedes::create($request->all());
        }else{
            Sedes::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('SedesController@index', $id = 0);
    }

    public function deletarSede(HttpRequest $request){

        if(empty($request->id)){
            return SedesController::index(0);
        }

        Sedes::find($request->id)->delete();

        return redirect()->action('SedesController@index', $id = 0);
    }


}
