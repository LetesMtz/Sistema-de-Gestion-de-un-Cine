<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    use HasFactory;

    protected $table='asiento';

    protected $primarykey='id_asiento';

    public $timestamps=false;

    protected $fillable=[
        'id_estado',
        'nombre',
        'id_sala'
    ];
}
