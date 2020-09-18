<?php

use Illuminate\Database\Seeder;

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
            'user_id' => '3',
            'image' => '_114360-453.jpg',
            'title' => '旅行に行きました！',
            'content' => '初めての海外旅行楽しかったです！また行きたいな',
            'tag' => '旅行',
        ]);
        DB::table('posts')->insert([
            'user_id' => '4',
            'image' => '_52683-40435.jpg',
            'title' => 'みんなとの旅行',
            'content' => '楽しかった！今度はどこに行こうかな',
            'tag' => '旅行',
        ]);
    }
}
