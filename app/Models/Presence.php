<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presence extends Model
{
    use HasFactory;

    protected $table = "presences";

    protected $primaryKey = "id_presensi";

    protected $fillable = [
        "id_siswa",
        "tanggal",
        "waktu",
        "kode_latitude",
        "kode_longitude",
        "jurnal_kegiatan",
        "keterangan",
        "status",
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'id_siswa', 'id_siswa');
    }
}
