<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Concierge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'objective',
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

    public function entry(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
}
