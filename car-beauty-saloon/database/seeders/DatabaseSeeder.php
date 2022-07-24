<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $address = collect([]);

        do {
            $address->push($faker->address);
            $address = $address->unique();
        } while ($address->count() < 20);

        foreach ($address as $ads) {
            DB::table('saloons')->insert([
                'saloon' => $ads,
                'street' => $ads,
                'number' => $ads,
                'city' => $ads,
                'zip' => $ads,
            ]);
        }


        $services = [
            'Tire and Wheel Cleaner', 'Rinseless Wash', 'Brushless Wash', 'Undercarriage Wash', 'Ceramic FastWax', 'Extreme Shine Wax', 'Splash Hot Wax', 'Windows Clean', 'Interior Vacuum', 'Dash & Door Jambs Wipe', 'Soft Cloth Bath & Turbo Dry'
        ];
        foreach (range(1, 12) as $_) {
            DB::table('services')->insert([
                'services' => $services[rand(0, count($services) - 1)],
                'saloon_id' => rand(1, 11)
            ]);
        }
    }
}
