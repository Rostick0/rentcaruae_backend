<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LazyCollection::make(function () {
            $data = json_decode(file_get_contents(
                __DIR__ . '/files/makes.json'
            ), true);

            $i = 0;
            while (count($data) > $i) {
                yield $data[$i];
                $i++;
            }
        })->chunk(1000)->each(function ($item) {
            Brand::insert($item->toArray());
        });
    }
}
