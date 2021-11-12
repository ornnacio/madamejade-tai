<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for($i = 0; $i < 10; $i++){
			
			DB::table('produtos')->insert([
				'nome' => Str::random(8),
				'desc' => Str::random(16),
				'preço' => rand(1, 100),
				'quantidade' => rand(0, 50),
			]);
		}
    }
}
