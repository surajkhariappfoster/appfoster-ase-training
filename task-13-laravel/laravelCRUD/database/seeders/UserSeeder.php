<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
        $userId = 1;

        for ($i = 0; $i < 20; $i++) {
            $users = new Users;
            $users->id = $userId++;
            $users->name = $faker->name;
            $users->email = $faker->email;
            $users->gender = "female";
            $users->status = "inactive";
            $users->save();
        }
    }
}
