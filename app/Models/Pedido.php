<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	protected $fillable = ['cliente', 'descrição', 'total', 'id_produto'];

	public function produto(){
		return $this->belongsTo(Produto::class, 'id_produto', 'id');
	}
}
