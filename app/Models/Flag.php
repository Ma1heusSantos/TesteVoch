<?php

namespace App\Models;

use App\Observers\FlagObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 
#[ObservedBy([FlagObserver::class])]


class Flag extends Model
{
    use HasFactory;
    protected $fillable = ['nome','economic_group_id'];
    
    public function economicGroup():BelongsTo
    {
        return $this->belongsTo(EconomicGroup::class,'economic_group_id','id');
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}