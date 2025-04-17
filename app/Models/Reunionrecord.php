<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reunionrecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'mainagenda',
        'objective',
        'location',
        'discussion',
        'data',
        'employee_id',
        'unit_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function signaturereunionrecord(): HasMany
    {
        return $this->hasMany(Signaturereunionrecord::class);
    }
}
