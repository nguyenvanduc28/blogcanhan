<?php

namespace Database\Seeders;

use App\Models\Category;
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
        //
        Category::firstOrCreate([
            'name' => 'Du Lịch'
        ]);
        Category::firstOrCreate([
            'name' => 'Tản Mạn'
        ]);
        Category::firstOrCreate([
            'name' => 'Chuyện Chưa kể'
        ]);
        Category::firstOrCreate([
            'name' => 'Học Tập'
        ]);
        Category::firstOrCreate([
            'name' => 'Kiến Thức Kinh Doanh'
        ]);
    }
}
