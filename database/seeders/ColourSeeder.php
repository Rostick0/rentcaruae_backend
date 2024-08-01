<?php

namespace Database\Seeders;

use App\Models\Colour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'black',
                'style' => 'background: rgb(0, 0, 0); border-color: rgb(0, 0, 0);',
            ],
            [
                'name' => 'silver',
                'style' => ' background: linear-gradient(rgb(240, 240, 240), rgb(193, 193, 193));border-color: rgb(193, 193, 193);',
            ],
            [
                'name' => 'white',
                'style' => 'background: rgb(255, 255, 255);box-shadow: rgba(0, 0, 0, 0.12) 0px 0px 0px 1px;border-color: rgba(0, 0, 0, 0.12);',
            ],
            [
                'name' => 'grey',
                'style' => 'background: rgb(156, 153, 153); border-color: rgb(156, 153, 153)',
            ],
            [
                'name' => 'blue',
                'style' => 'background: rgb(51, 77, 255); border-color: rgb(51, 77, 255)',
            ],
            [
                'name' => 'red',
                'style' => 'background: rgb(252, 72, 41); border-color: rgb(252, 72, 41)',
            ],
            [
                'name' => 'green',
                'style' => 'background: rgb(53, 186, 43); border-color: rgb(53, 186, 43)',
            ],
            [
                'name' => 'brown',
                'style' => 'background: rgb(146, 101, 71); border-color: rgb(146, 101, 71)',
            ],
            [
                'name' => 'beige',
                'style' => 'background: rgb(241, 217, 178); border-color: rgb(241, 217, 178)',
            ],
            [
                'name' => 'light blue',
                'style' => 'background: rgb(54, 161, 255); border-color: rgb(54, 161, 255)',
            ],
            [
                'name' => 'golden',
                'style' => 'background: linear-gradient(rgb(255, 237, 2), rgb(253, 156, 0));border-color: rgb(250, 190, 0);',
            ],
            [
                'name' => 'magenta',
                'style' => 'background: rgb(197, 23, 45); border-color: rgb(197, 23, 45)',
            ],
            [
                'name' => 'purple',
                'style' => 'background: rgb(153, 102, 204); border-color: rgb(153, 102, 204)',
            ],
            [
                'name' => 'yellow',
                'style' => 'background: rgb(253, 233, 15); border-color: rgb(253, 233, 15)',
            ],
            [
                'name' => 'orange',
                'style' => 'background: rgb(255, 153, 102); border-color: rgb(255, 153, 102)',
            ],
            [
                'name' => 'pink',
                'style' => 'background: rgb(255, 192, 203); border-color: rgb(255, 192, 203)',
            ],
        ];

        Colour::insert($data);
    }
}
