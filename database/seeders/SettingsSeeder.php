<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        Settings::create([
            'phone' => $faker->phoneNumber,
            'email' => $faker->safeEmail,
            'address' => $faker->address,
            'short_address' => $faker->streetAddress,
            'facebook' => $faker->url,
            'twitter' => $faker->url,
            'instagram' => $faker->url,
            'youtube' => $faker->url,
        ]);
    }
}
