<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = [
            'name' => 'Producto 1',
            'price' => 123.45,
            'tax' => 5,
        ];

        if(Product::where('name', $product1['name'])->count() == 0) {
            Product::create($product1);
        }

        $product2 = [
            'name' => 'Producto 2',
            'price' => 46.65,
            'tax' => 15,
        ];

        if(Product::where('name', $product2['name'])->count() == 0) {
            Product::create($product2);
        }

        $product3 = [
            'name' => 'Producto 3',
            'price' => 39.73,
            'tax' => 12,
        ];

        if(Product::where('name', $product3['name'])->count() == 0) {
            Product::create($product3);
        }

        $product4 = [
            'name' => 'Producto 4',
            'price' => 250.00,
            'tax' => 8,
        ];

        if(Product::where('name', $product4['name'])->count() == 0) {
            Product::create($product4);
        }

        $product5 = [
            'name' => 'Producto 5',
            'price' => 59.35,
            'tax' => 10,
        ];

        if(Product::where('name', $product5['name'])->count() == 0) {
            Product::create($product5);
        }
    }
}
