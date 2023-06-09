<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'foodname' => 'Bún chả cá',
                'description' => 'Món ăn ngon miệng được chế biến từ cá và bún.',
                'ingredient' => '300 gr cá, 100 gr bún, gia vị và rau.',
                'recipe' => '1. Rửa sạch cá, cắt thành từng miếng nhỏ.
                             2. Nêm nếm cá với gia vị và để nguội trong vòng 30 phút.
                             3. Nướng cá trên vỉ than cho đến khi cá chín vàng.
                             4. Nấu bún và chuẩn bị rau thơm.
                             5. Để bún, rau và cá ra đĩa và tận hưởng!',
                'image' => 'https://example.com/bun-cha-ca.jpg',
            ],
            [
                'foodname' => 'Phở bò',
                'description' => 'Món ăn truyền thống của người Việt được chế biến từ thịt bò và bún.',
                'ingredient' => '300 gr thịt bò, 100 gr bún, gia vị và rau.',
                'recipe' => '1. Hầm thịt bò với gia vị trong 2 giờ.
                             2. Nấu bún và chuẩn bị rau thơm.
                             3. Để bún, rau và thịt bò ra đĩa và tận hưởng!',
                'image' => 'https://example.com/pho-bo.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}