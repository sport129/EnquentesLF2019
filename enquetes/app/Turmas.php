<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turmas extends Model
{
    
    protected $primaryKey = 'id_turma';
    
    public $timestamps = false;

    protected $table = 'tb_turma';

    protected $fillable = array('id_turma', 'Turma');

    protected $guarded = ['id_turma'];
}
