<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'desc', 'preço', 'quantidade', 'nome_arquivo', 'produto_categoria'];

    public function categoria(){
      return $this->belongsTo(ProdutoCategoria::class, 'produto_categoria', 'id');
    }

    public function pedidos(){
      return $this->hasMany(Pedido::class, 'id_produto', 'id');
    }
}
