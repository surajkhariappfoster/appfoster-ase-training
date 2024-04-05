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
        // fetch all users
        // traverse over these users and create projects for them
        $projectId = 1;
        foreach($users as $user) {
            $random = 3;
            for ($i = 0; $i < $random; $i++) {
                $project = new Project();
                $projects->user_id = $user->id;
                // $projects->project_name = ;
                $projects->save();
            }
        }

        for ($i = 0; $i < 20; $i++) {
            $projects = new Projects;
            $projects->id =  mt_rand(26, 50);
            $projects->user_id = $projectId++;
            $projects->project_name = "Project A";
            $projects->save();
        }
    }
}
