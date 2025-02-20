<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['nome_fantasia','razao_social','cnpj','flag_id'];
    protected $dates = ['deleted_at'];

    public function flag():BelongsTo
    {
        return $this->belongsTo(Flag::class,'flag_id','id');
    }
    public function collaborators(): HasMany
    {
        return $this->hasMany(Collaborator::class);
    }

    protected static function booted()
    {
        static::deleting(function ($unit) {
            $unit->collaborators()->delete(); 
        });
    }
}