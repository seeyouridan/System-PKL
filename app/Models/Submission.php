<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'id_siswa',
        'id_kota',
        'status',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'id_siswa');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Kota::class, 'id_kota');
    }

    public function pkls()
    {
        return $this->hasMany(Pkl::class, 'id_siswa', 'id_siswa');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($submission) {
            // Hapus pkls yang terkait dengan submission ini
            $submission->pkls()->delete();
        });
    }
}
