<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $guarded = [];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function disponivel()
    {
        return !$this->emprestimos()->where('devolvido', false)->exists();
    }
}
