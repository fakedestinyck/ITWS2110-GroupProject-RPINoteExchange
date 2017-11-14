<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 500; $i++) {
            \App\Post::create([
                'user_id'   => rand(1,500),
                'major_id'    => rand(1,3),
                'material_type_id'    => rand(1,3),
                'share_or_ask'    => rand(0,1),
                'free_or_paid'    => rand(0,1),
                'content' => 'content'.$i,
                'is_shown' => 1,
            ]);
        }
    }
}
