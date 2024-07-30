<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'UAE',
                'image_url' => '/images/flags/ae.svg',
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

        Country::insert($data);
    }
}
