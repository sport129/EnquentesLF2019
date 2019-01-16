<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Series;
use App\Http\Requests\SeriesRequest;

class SeriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $listagem = Series::orderBy('Serie')->get();

        $editSerie = Series::find($id);

        if(empty($editSerie)){
            return view('administracao.serie')->with(['listagem' => $listagem, 'serie' => $editSerie]);
        }

        return view('administracao.serie')->with(['listagem' => $listagem, 'serie' => $editSerie]);
    }

    public function addSerie(SeriesRequest $request, $id){

        if($id == 0){
            Series::create($request->all());
        }else{
            Series::find($request->id)->update(Request::except($id));
        }

        return redirect()->action('SeriesController@index', $id = 0);
    }

    public function deletarSerie(HttpRequest $request){

        if(empty($request->id)){
            return SeriesController::index(0);
        }

        Series::find($request->id)->delete();

        return redirect()->action('SeriesController@index', $id = 0);
    }
}
