<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'produto_categoria', 'id');
    }
}
