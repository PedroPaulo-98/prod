<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Checksystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'adicionalinformation',
        'status',
        'checklist_id',
        'platform_id',
        'employee_id',
        'system_id',
    ];
    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
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
