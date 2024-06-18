<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pkl extends Model
{
    use HasFactory;

    protected $table = 'pkls';

    protected $fillable = [
        'id_siswa',
        'id_instansi'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'id_siswa');
    }

    public function instance(): BelongsTo
    {
        return $this->belongsTo(Instance::class, 'id_instansi');
    }
}
