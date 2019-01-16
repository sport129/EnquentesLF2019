<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $primaryKey = 'id_sedes';
    
    public $timestamps = false;

    protected $table = 'tb_sedes';

    protected $fillable = array('id_sedes', 'Sede');

    protected $guarded = ['id_sedes'];
}
