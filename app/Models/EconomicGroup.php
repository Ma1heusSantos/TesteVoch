<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EconomicGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome'];
    protected $dates = ['deleted_at'];


    public function flags(): HasMany
    {
        return $this->hasMany(Flag::class);
    }

    protected static function booted()
    {
        static::deleting(function ($economicGroup) {
            $economicGroup->flags()->delete(); 
        });
    }
}