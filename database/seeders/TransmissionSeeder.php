<?php

namespace Database\Seeders;

use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['Petrol', 'Hybrid', 'Electro', 'Diesel', 'Gas', 'Gasoline', 'Hydrogen'];

        $data = array_map(
            fn ($name, $i) => [
                'id' => $i + 1,
                'name' => $name,
            ],
            $arr,
            array_keys($arr)
        );

        Transmission::insert($data);
    }
}
