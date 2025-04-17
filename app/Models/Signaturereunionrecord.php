<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Signaturereunionrecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'fuction',
        'signature',
        'reunionrecord_id',
    ];

    public function reunionrecord(): BelongsTo
    {
        return $this->belongsTo(Reunionrecord::class);
    }
}
