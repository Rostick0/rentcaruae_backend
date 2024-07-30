<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'Parking sensores',
                'type' => 'safety',
            ],
            [
                'name' => 'Rear Camera',
                'type' => 'safety',
            ],
            [
                'name' => 'Isofix',
                'type' => 'safety',
            ],
            [
                'name' => 'Camera 360',
                'type' => 'safety',
            ],

            [
                'name' => 'Navigation',
                'type' => 'multimedia',
            ],
            [
                'name' => 'Apple CarPlay',
                'type' => 'multimedia',
            ],

            [
                'name' => 'Cruisw Control',
                'type' => 'comfort',
            ],
            [
                'name' => 'Basic Autopilot',
                'type' => 'comfort',
            ],
            [
                'name' => 'SunRoof',
                'type' => 'comfort',
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

        Option::insert($data);
    }
}
