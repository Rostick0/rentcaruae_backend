<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['Economy', 'VAN', 'SUV', 'Convertible', 'Business', 'Luxury', 'Sports', 'Electric (EV)'];

        $data = array_map(
            fn ($name, $i) => [
                'id' => $i + 1,
                'name' => $name,
            ],
            $arr,
            array_keys($arr)
        );

        Category::insert($data);
    }
}
