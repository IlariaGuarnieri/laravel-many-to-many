<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;             //importo Model
use App\Models\Technology;
use App\Models\Type;
use App\Functions\Helper as Help;   //importo Helper

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Project1', 'Project2', 'Project3', 'Project4', 'Project5', 'Project6', 'Project7'];
        foreach ($data as $item) {
            $new_item = new Project();
            //associazione random di id della categria al post
            $new_item->type_id= Type::inRandomOrder()->first()->id;
            $new_item->title = $item;
            $new_item->slug = Help::generateSlug($new_item->title, new Project() ); //tra le parentesi, come previsto in  Helper.php ci va stringa ovvero: $new_item->title ( oppure $item) e model new Project() oppure  Project::class

            $new_item->save();
        }
    }
}
