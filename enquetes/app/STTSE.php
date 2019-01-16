<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STTSE extends Model
{
    protected $primaryKey = 'id_sttse';
    
    public $timestamps = false;

    protected $table = 'tb_sede_turma_turno_serie_ensino';

    protected $fillable = array('id_sttse', 'fk_sede', 'fk_turno', 'fk_serie', 'fk_turma', 'fk_ensino');

    protected $guarded = ['id_sttse'];
}
