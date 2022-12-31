<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'product_name' => 'Turban',
                'product_details'    => '6feet long cotton turban',
                'product_price'    => '300',
                'product_image' => 'assets/uploads/xiaomi.jpg',
                'product_category' => 1,
            ],
            [
                'product_name' => 'Jacket',
                'product_details'    => 'Winter wind shield jacket',
                'product_price'    => '3000',
                'product_image' => 'assets/uploads/xiaomi.jpg',
                'product_category' => 1,
            ],
            [
                'product_name' => 'Coat',
                'product_details'    => 'Formal coat',
                'product_price'    => '2500',
                'product_image' => 'assets/uploads/xiaomi.jpg',
                'product_category' => 1,
            ],
            [
                'product_name' => 'Casual shoes',
                'product_details'    => 'Running shoes',
                'product_price'    => '2500',
                'product_image' => 'assets/uploads/xiaomi.jpg',
                'product_category' => 1,
            ],
            [
                'product_name' => 'Sneakers',
                'product_details'    => 'Fancy sneakers for everday use',
                'product_price'    => '2500',
                'product_category' => 1,
            ],
        ];
        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        foreach ($datas as $data) {
            $this->db->table('products')->insert($data);
        }
    }
}
