<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Máy ảnh Canon',
            'slug' => Str::slug('Máy ảnh Canon'),
            'description' => 'Máy ảnh chuyên nghiệp cho người mới bắt đầu.',
            'price' => 15000000,
            'stock' => 10,
            'category_id' => 1, // giả sử category_id = 1 đã tồn tại
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'Tai nghe Bluetooth',
            'slug' => Str::slug('Tai nghe Bluetooth'),
            'description' => 'Tai nghe không dây chất lượng cao.',
            'price' => 1200000,
            'stock' => 30,
            'category_id' => 2,
            'status' => 'active',
        ]);
    }
}
