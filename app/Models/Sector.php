<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'initials',
        'fuction',
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

}
