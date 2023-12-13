<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Villager;

class VillagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        Villager::query()->create([
            'region_rt' => "RT 01",
            'nik' => $faker->unique()->numberBetween(1111111111111111, 9999999999999999),
            'number_kk' => $faker->unique()->numberBetween(1111111111111111, 9999999999999999),
            'name' => 'Admin',
            'place_of_birth' => $faker->city,
            'date_of_birth' => $faker->date,
            'gender' => "Laki-Laki",
            'religion' => 'Islam',
            'address' => $faker->streetAddress,
            'job' => $faker->jobTitle,
            'nationaly' => 'Indonesia',
            'phone_number' => $faker->numberBetween(111111111111, 999999999999),
            'status_account' => 1,
        ]);

        $region = [Villager::RT1, Villager::RT2, Villager::RT3, Villager::RT4, Villager::RT5];

        foreach ($region as $key) {
            Villager::query()->create([
                'region_rt' => $key,
                'nik' => $faker->unique()->numberBetween(1111111111111111, 9999999999999999),
                'number_kk' => $faker->unique()->numberBetween(1111111111111111, 9999999999999999),
                'name' => $faker->name,
                'place_of_birth' => $faker->city,
                'date_of_birth' => $faker->date,
                'gender' => "Laki-Laki",
                'religion' => 'Islam',
                'address' => $faker->streetAddress,
                'job' => $faker->jobTitle,
                'nationaly' => 'Indonesia',
                'phone_number' => $faker->numberBetween(111111111111, 999999999999),
            ]);
        }
    }
}
