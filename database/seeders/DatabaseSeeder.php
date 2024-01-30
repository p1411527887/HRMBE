<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        DB::table('permission_assignment')->insert([
//            [
//                'group_id' => '10000',
//                'permission_action_id' => '1',
//            ],
//
//            [
//                'group_id' => '10000',
//                'permission_action_id' => '2',
//            ]
//        ]);

//        DB::table('permission_assigment')->insert([
//            [
//                'permission_slug_id' => 10100,
//                'permission_action_id' => 1,
//            ],
//        ]);
//        $user = DB::table('cwd_user')->get();
//        $cwd_user_attributes_id = 10227;
//        foreach ($user as $item){
//            DB::table('cwd_user_attributes')->insert([
//                [
//                    'ID' => $cwd_user_attributes_id++,
//                    'user_id' => $item->ID,
//                    'level_id' => 1,
//                    'directory_id' => 1,
//                    'attribute_name' => 'lastRate',
//                    'attribute_value' => 20000000,
//                    'lower_attribute_value' => 20000000
//                ]
//            ]);
//        }
    }
}
