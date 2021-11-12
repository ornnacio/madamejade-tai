<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
			
			DB::table('mudas')->insert([
				'espécie' => Str::random(8).' '.Str::random(8),
				'data_plantação' => Carbon::create(rand(2019, 2021), rand(1, 12), rand(1, 28)),
				'data_germinação' => Carbon::create(rand(2019, 2021), rand(1, 12), rand(1, 28)),
				'número_filhas' => rand(0, 5),
			]);
		}
    }
}
