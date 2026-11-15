<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $guarded = [];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
