<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'observation',
        'additional',
    ];

    public function dropdesks(): HasMany
    {
        return $this->hasMany(Dropdesk::class);
    }
    public function checkinternet(): HasMany
    {
        return $this->hasMany(Checkinternet::class);
    }
    public function checksystem(): HasMany
    {
        return $this->hasMany(Checksystem::class);
    }
    public function checkinfrastructure(): HasMany
    {
        return $this->hasMany(Checkinfrastructure::class);
    }
    public function checkadministrative(): HasMany
    {
        return $this->hasMany(Checkadministrative::class);
    }
    public function checksecurity(): HasMany
    {
        return $this->hasMany(Checksecurity::class);
    }
    public function checksector(): HasMany
    {
        return $this->hasMany(Checksector::class);
    }
}
