<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_siswa',
        'laporan',
        'nama_file',
        'laporan_revisi',
        'nama_file_revisi',
        'nilai'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'id_siswa');
    }
}
