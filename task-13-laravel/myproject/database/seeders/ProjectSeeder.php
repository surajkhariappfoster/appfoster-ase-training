<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projects;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
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
        $projects = new Projects;
        $projects->id = $faker->numberBetween(200,250);
        $projects->user_id = $faker->numberBetween(200, 250);
        $projects->name = "Project B";
    

        $projects->save();
        }
    }
}
