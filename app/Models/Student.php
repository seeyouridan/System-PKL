<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'id_jurusan',
        'id_guru',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'id_jurusan', 'id_jurusan');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'id_guru', 'id_guru');
    }
}
