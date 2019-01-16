<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $primaryKey = 'id_serie';
    
    public $timestamps = false;

    protected $table = 'tb_series';

    protected $fillable = array('id_serie', 'Serie');

    protected $guarded = ['id_serie'];
}
