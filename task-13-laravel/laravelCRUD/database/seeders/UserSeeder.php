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
            $user = new User();
            $user->id = $userId++;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->gender = "female";
            $user->status = "inactive";
            $user->save();

            $random = 3;
            for ($i = 0; $i < $random; $i++) {
                $project = new Project();
                $projects->user_id = $user->id;
                // $projects->project_name = ;
                $projects->save();
            }
        }
    }

    public function getGender()
    {
        $genders = ['male', 'female', 'other'];
        // returns random thing from an array
    }
}
