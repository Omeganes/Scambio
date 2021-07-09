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
        $categoriesArr = [
            ['Computers', 'https://image.flaticon.com/icons/png/512/73/73443.png'],
            ['Books', 'https://image.flaticon.com/icons/png/512/13/13239.png'],
            ['Mobiles', 'https://lh3.googleusercontent.com/proxy/Ip5Lc0ZTqTrYYWkLgSv90ZV4lJtgzP-oiXkxQtBqZJUXDjtsJvBttFu3VwqanY1IH9cUHva7MSp1rXZ3Jyf4j9NIIBumUmwz4_xW1sSDfzF9lmhQaQ'],
            ['Household Devices', 'https://www.rawshorts.com/freeicons/wp-content/uploads/2017/01/re-pict-house-base.png'],
            ['Furniture', 'https://www.pngkey.com/png/detail/369-3693509_home-appliances-and-furniture-household-furniture-icon-png.png']
        ];

        foreach ($categoriesArr as $category) {
            Category::create([
                'name' => $category[0],
                'image' => $category[1]
            ]);
        }
    }
}
