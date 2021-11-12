<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = Produto::all();
		$ids = array();
		
		foreach($produtos as $p){
			array_push($ids, $p->id);
		}
		
		for($i = 0; $i < 20; $i++){
			
			DB::table('pedidos')->insert([
				'cliente' => Str::random(10),
				'descrição' => Str::random(20),
				'total' => rand(0, 100),
				'id_produto' => $ids[array_rand($ids, 1)],
			]);
		}
    }
}
