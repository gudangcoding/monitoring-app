<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Absensi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal',
        'kelas_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'date',
        'kelas_id' => 'integer',
    ];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Kelas::class);
    }

    public function absensiDetails(): HasMany
    {
        return $this->hasMany(AbsensiDetail::class);
    }
}
