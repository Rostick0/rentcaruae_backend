<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'Abu Dhabi',
                'country_id' => 1,
            ],
            [
                'name' => 'Al Ain',
                'country_id' => 1,
            ],
            [
                'name' => 'Ajman',
                'country_id' => 1,
            ],
            [
                'name' => 'Dubai',
                'country_id' => 1,
            ],
            [
                'name' => 'Fujairah',
                'country_id' => 1,
            ],
            [
                'name' => 'Ras al-Khaimah',
                'country_id' => 1,
            ],
            [
                'name' => 'Sarjah',
                'country_id' => 1,
            ],
            [
                'name' => 'Umm al-Quwain',
                'country_id' => 1,
            ],
        ];

        $data = array_map(
            fn ($item, $i) => [
                'id' => $i + 1,
                ...$item,
            ],
            $arr,
            array_keys($arr)
        );

        City::insert($data);
    }
}
