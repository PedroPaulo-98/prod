<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Checksecurity extends Model
{
    use HasFactory;

    protected $fillable = [
        'adicionalinformation',
        'status',
        'checklist_id',
        'security_id',
        'employee_id',
        'platform_id',
    ];
    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
    public function security(): BelongsTo
    {
        return $this->belongsTo(Security::class);
    }
    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
