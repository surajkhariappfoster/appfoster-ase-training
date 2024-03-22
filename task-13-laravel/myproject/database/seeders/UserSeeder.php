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
        for($i=1; $i<=50; $i++)
        {
        $users = new Users;
        $users->name =    $faker->name;
        $users->email=    $faker->email;
        $users->gender="male";
        $users->status="active";

        $users->save();
        }
        
    }
}
