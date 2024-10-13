<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbsensiDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'absensi_id',
        'siswa_id',
        'hadir',
        'alfa',
        'sakit',
        'izin',
        'keterangan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'absensi_id' => 'integer',
        'siswa_id' => 'integer',
    ];

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
    public function absensiDetails(): BelongsTo
    {
        return $this->belongsTo(AbsensiDetail::class);
    }
}
