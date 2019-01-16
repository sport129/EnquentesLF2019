<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    protected $primaryKey = 'id_turno';
    
    public $timestamps = false;

    protected $table = 'tb_turno';

    protected $fillable = array('id_turno', 'Turno');

    protected $guarded = ['id_turno'];
}
