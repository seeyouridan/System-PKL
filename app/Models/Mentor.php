<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentors';

    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nip_guru',
        'nama_guru',
        'jenis_kelamin',
        'no_telp',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
