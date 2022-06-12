<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->nom = "Apéritif";
        $category1->is_online = 1;
        $category1->save();

        $category2 = new Category();
        $category2->nom = "Entrées";
        $category2->is_online = 1;
        $category2->save();

        $category3 = new Category();
        $category3->nom = "Plats";
        $category3->is_online = 1;
        $category3->save();

        $category4 = new Category();
        $category4->nom = "Désserts";
        $category4->is_online = 1;
        $category4->save();

        $category5 = new Category();
        $category5->nom = "Boissons";
        $category5->is_online = 1;
        $category5->save();
    }
}
