<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesArr = ['Computers', 'Books', 'Mobiles', 'Household Devices', 'Furniture'];

        foreach ($categoriesArr as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'image' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg'
            ]);
        }
    }
}
