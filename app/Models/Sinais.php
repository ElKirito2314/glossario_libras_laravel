<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinais extends Model
{
    protected $table = 'sinais';
    protected $fillable = ['termo_id', 'midia', 'descricao', 'fonte'];

    public function termos(){
        return $this->belongsTo(termos::class, 'termo_id');
    }
}
