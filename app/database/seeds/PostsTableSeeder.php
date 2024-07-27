<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'image' => 1,
            'episode' => 'サンプル',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
