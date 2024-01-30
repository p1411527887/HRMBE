<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = ['junior+', 'junior++', 'middle', 'middle+', 'middle++'];
        $rate = 19000000;
        for($i=0; $i<count($levels); $i++){
            DB::table('levels')->insert([
                [
                    'name' => $levels[$i],
                    'rate_last' => $rate,
                    'rate' => $rate+=1000000,
                ],
            ]);
        }
    }
}
