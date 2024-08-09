<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'full_name' => 'Test',
            'email' => 'rostik057@gmail.com',
            'tel' => '88005553535',
        ];

        $user = User::create($data);

        $user->company()->create([
            'name' => 'company',
            'city_id' => 1,
        ]);
    }
}
