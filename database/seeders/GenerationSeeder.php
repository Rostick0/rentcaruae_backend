<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class GenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(
            __DIR__ . '/files/generations.json'
        ), true);

        LazyCollection::make(function () {
            $data = json_decode(file_get_contents(
                __DIR__ . '/files/generations.json'
            ), true);

            $i = 0;
            while (count($data) > $i) {
                yield $data[$i];
                $i++;
            }
        })->chunk(1000)->each(function ($item) {
            Generation::insert($item->toArray());
        });

        // Generation::insert($data);
    }
}
