<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'kota',
        'jml_instansi',
    ];
}
