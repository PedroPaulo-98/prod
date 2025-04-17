<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Checkinternet extends Model
{
    use HasFactory;


    protected $fillable = [
        'adicionalinformation',
        'status',
        'checklist_id',
        'provider_id',
        'employee_id',
        'platform_id',
    ];
    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
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
