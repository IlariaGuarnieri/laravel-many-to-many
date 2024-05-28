<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //estraggo il project random
        $project = Project::inRandomOrder()->first();
        //estraggo random l'id della teg
        $technology_id = Technology::inRandomOrder()->first()->id;
        //aggiungo relazione nella tabella pivot
        $project->technlogies()->attach($technology_id);
    }
}
