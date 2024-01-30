<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CwdUserAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lastCwdUserAttribute =  \App\Models\CwdUserAttribute::orderBy('ID', 'desc')->limit(1)->get();
        $lastIdCwdUserAttribute = $lastCwdUserAttribute[0]['ID'];
        $user = DB::table('cwd_user')->get();
        foreach ($user as $item){
            DB::table('cwd_user_attributes')->insert([
                [
                    'ID' => $lastIdCwdUserAttribute+=1,
                    'user_id' => $item->ID,
                    'directory_id' => 1,
                    'attribute_name' => 'lastRate',
                    'attribute_value' => 20000000,
                    'lower_attribute_value' => 20000000
                ],
                [
                    'ID' => $lastIdCwdUserAttribute+=1,
                    'user_id' => $item->ID,
                    'directory_id' => 1,
                    'attribute_name' => 'rate',
                    'attribute_value' => 20000000,
                    'lower_attribute_value' => 20000000
                ],
                [
                    'ID' => $lastIdCwdUserAttribute+=1,
                    'user_id' => $item->ID,
                    'directory_id' => 1,
                    'attribute_name' => 'level.id',
                    'attribute_value' => 1,
                    'lower_attribute_value' => 1
                ]
            ]);
        }
//        php artisan db:seed --class=CwdUserAttributeSeeder
    }
}
