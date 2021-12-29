<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag([
            'name' => 'Science'
        ]);
        $tag->save();

        $tag = new Tag([
            'name' => 'Programming'
        ]);
        $tag->save();
    }
}
