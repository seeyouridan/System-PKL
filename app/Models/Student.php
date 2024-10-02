<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'id_jurusan',
        'id_guru',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_jurusan', 'id_jurusan');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'id_guru', 'id_guru');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_siswa');
    }

    public function presence(): HasMany
    {
        return $this->hasMany(Presence::class, 'id_siswa');
    }
}
