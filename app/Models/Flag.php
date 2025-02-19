<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flag extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['nome','economic_group_id'];
    protected $dates = ['deleted_at'];
    
    public function economicGroup():BelongsTo
    {
        return $this->belongsTo(EconomicGroup::class,'economic_group_id','id');
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    protected static function booted()
    {
        static::deleting(function ($flag) {
            $flag->units()->delete(); 
        });
    }
}