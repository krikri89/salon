<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Faker\factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'name' => 'bebras',
        //     'email' => 'bebras@gmail.com',
        //     'password' => Hash::make('123'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'briedis',
        //     'email' => 'briedis@gmail.com',
        //     'password' => Hash::make('123'),
        //     'role' => 10,
        // ]);


        $saloon = ['Star service', 'Becky Bill', 'Drive Inn', 'La Mancha', 'Bubble Land', 'dsrff'];
        $street = ['Bubble av.', 'Palmtree st.', 'Soho av.', 'HollyWood av.', 'Prezident st.'];
        $city = ['LalaLand', 'Paris', 'Brooklyn', 'Moletai', 'London'];

        foreach (range(0, 4) as $_) {
            DB::table('saloons')->insert([
                'saloon' => $saloon[$_],
                'street' => $street[rand(0, count($street) - 1)],
                'number' => rand(100, 999),
                'city' => $city[rand(0, count($city) - 1)],
                'zip' => rand(10000, 99999),

            ]);
        }

        $services = [
            'Tire and Wheel Cleaner', 'Rinseless Wash', 'Brushless Wash', 'Undercarriage Wash', 'Ceramic FastWax', 'Extreme Shine Wax', 'Splash Hot Wax', 'Windows Clean', 'Interior Vacuum', 'Dash & Door Jambs Wipe', 'Soft Cloth Bath & Turbo Dry'
        ];
        foreach (range(1, 12) as $_) {
            DB::table('services')->insert([
                'service' => $services[rand(0, count($services) - 1)],
                'saloon_id' => rand(1, 5)
            ]);
        }

        $masters = ['Josh', 'Marco', 'Robin', 'Johny', 'Jaunito', 'Kenny', 'Manu'];

        foreach (range(1, 7) as $_) {
            DB::table('masters')->insert([
                'master' => $masters[rand(0, count($masters) - 1)],
                'rating' => rand(1, 10),

            ]);
        }
    }
}
