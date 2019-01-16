<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensino extends Model
{
    protected $primaryKey = 'id_ensino';
    
    public $timestamps = false;

    protected $table = 'tb_ensino';

    protected $fillable = array('id_ensino', 'Ensino');

    protected $guarded = ['id_ensino'];
}
