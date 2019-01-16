<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\STTSE;
use App\Ensino;
use App\Sedes;
use App\Series;
use App\Turmas;
use App\Turnos;
use Request as HttpRequest;
use Illuminate\Support\Facades\DB;

class STTSEController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $table = DB::table('tb_sede_turma_turno_serie_ensino')
                        ->join('tb_sedes', 'tb_sede_turma_turno_serie_ensino.fk_sede', '=', 'tb_sedes.id_sedes' )
                        ->join('tb_ensino', 'tb_sede_turma_turno_serie_ensino.fk_ensino', '=', 'tb_ensino.id_ensino')
                        ->join('tb_series', 'tb_sede_turma_turno_serie_ensino.fk_serie', '=', 'tb_series.id_serie')
                        ->join('tb_turma', 'tb_sede_turma_turno_serie_ensino.fk_turma', '=', 'tb_turma.id_turma')
                        ->join('tb_turno', 'tb_sede_turma_turno_serie_ensino.fk_turno', '=', 'tb_turno.id_turno')
                        ->select('tb_sede_turma_turno_serie_ensino.id_sttse', 'tb_sedes.Sede', 'tb_ensino.Ensino', 'tb_series.Serie', 'tb_turma.Turma', 'tb_turno.Turno')
                        ->get();

        return view('sttse.index')->with(['table' => $table]);
    }

    public function cadastroSTTSE(){
        $ensinos = Ensino::all();
        $sedes = Sedes::all();
        $series = Series::all();
        $turmas = Turmas::all();
        $turnos = Turnos::all();

        return view('sttse.cadastro')->with(['ensinos' => $ensinos, 'sedes' => $sedes, 'series' => $series, 'turmas' => $turmas, 'turnos' => $turnos]); 
    }

    public function cadastrar(Request $request){
        STTSE::create($request->all());
        $teste = "teste";
        
        return STTSEController::cadastroSTTSE()->with(['tt' => $teste]);
    }
}
