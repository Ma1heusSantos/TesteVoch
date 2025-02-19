<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['nome','email','cpf','unit_id'];
    protected $dates = ['deleted_at'];
    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}