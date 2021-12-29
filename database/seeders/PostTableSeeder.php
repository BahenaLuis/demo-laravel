<?php

namespace Database\Seeders;

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post([
            'title' => 'Dummy post one',
            'content' => 'Content dummy post one'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Dummy post two',
            'content' => 'Content dummy post two'
        ]);
        $post->save();
    }
}
