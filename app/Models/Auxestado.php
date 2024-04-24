<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Auxestado extends Model
{
    use HasFactory;

    
    protected $table = 'auxestado';

    protected $fillable = [
        'estado'
    ];

    public function estado(): BelongsTo {
        return $this->belongsTo(Auxestado::class, 'id', 'auxestado_id');
    }
}
