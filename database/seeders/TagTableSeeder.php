<?php

namespace Database\Seeders;

use App\Models\Tag;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $tag = new Tag();
        $tag->nom = "#flexitarien";
        $tag->save();

        $tag2 = new Tag();
        $tag2->nom = "#végétarien";
        $tag2->save();

        $tag3 = new Tag();
        $tag3->nom = "#sucré";
        $tag3->save();

        $tag4 = new Tag();
        $tag4->nom = "#salé";
        $tag4->save();
    }
}
