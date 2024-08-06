<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termos extends Model
{
    protected $table = 'termos';
    protected $fillable = ['categoria_id', 'termo_port', 'definicao'];

    public function categorias() {
        return $this->belongsTo(categorias::class, 'categoria_id');
    }
}
