<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'initials',
        'fuction',
        'employee_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
