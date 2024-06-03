<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instance extends Model
{
    use HasFactory;

    protected $table = 'instances';

    protected $primaryKey = 'id_instansi';

    protected $fillable = [
        'kode_instansi',
        'nama_instansi',
        'kuota',
        'alamat',
        'id_kota',
        'no_telp',
        'id_guru',
    ];

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class, 'id_kota');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'id_guru');
    }
}
