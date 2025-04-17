<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Dropdesk extends Model
{
    use HasFactory;

    protected $fillable = [
        'callnumber',
        'applicant',
        'subject',
        'attendant',
        'status',
        'data',
        'checklist_id'
    ];
    
    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
