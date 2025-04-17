<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'entryexit',
        'photo',
        'photo_type',
        'data',
        'concierge_id',
    ];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
    public function concierge()
    {
        return $this->belongsTo(Concierge::class);
    }
}
