<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Laptop',
            'Điện thoại',
            'Thời trang',
            'Sách',
            'Đồ gia dụng',
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'description' => 'Mô tả cho '.$categoryName,
                'status' => 1,
            ]);
        }
    }
}
