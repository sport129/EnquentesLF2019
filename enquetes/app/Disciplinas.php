<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{
    protected $primaryKey = 'id_disciplina';
    
    public $timestamps = false;

    protected $table = 'tb_disciplina';

    protected $fillable = array('id_disciplina', 'disciplina');

    protected $guarded = ['id_disciplina'];
}
