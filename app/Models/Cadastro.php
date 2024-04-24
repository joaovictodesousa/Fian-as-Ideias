<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cadastro extends Model
{
    use HasFactory; 

    protected $table = 'cadastro';

    protected $fillable = [
        'nf',
        'datavencimento',
        'datacriacao',
        'valor',
        'comprador',
        'vendedor',
        'auxestado'
    ];

    public function Estado(): BelongsTo {
        return $this->belongsTo(Auxestado::class, 'auxestado', 'id');
    }

}
