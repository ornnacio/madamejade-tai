<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto_categorias')->insert([
          ['nome' => 'Planta'],
          ['nome' => 'Adubo'],
          ['nome' => 'Vaso'],
          ['nome' => 'Decorativo']
        ]);
    }
}
