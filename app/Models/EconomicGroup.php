<?php

namespace App\Models;

use App\Observers\EconomicGroupObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 
#[ObservedBy([EconomicGroupObserver::class])]


class EconomicGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome'];
    protected $dates = ['deleted_at'];


    public function flags(): HasMany
    {
        return $this->hasMany(Flag::class);
    }
}