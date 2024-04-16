<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanio extends Model
{
    use HasFactory;

    protected $table='tamanio';

    protected $primarykey='id_tamanio';

    public $timestamps=false;

    protected $fillable=[
        'nombre'
    ];
}
