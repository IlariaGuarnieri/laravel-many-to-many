<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;                //importo Model
use App\Functions\Helper as Help;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['type1', ' type2', 'type3', 'type4', 'type5', 'type6'];
        foreach ($data as $item) {
            $new_item = new Type();
            $new_item->title = $item;
            $new_item->slug = Help::generateSlug($item, Type::class); //tra le parentesi, come previsto in  Helper.php ci va stringa ovvero: $new_item->title ( oppure $item) e model new Project() oppure  Project::class
            $new_item->save();
            // dump($new_item);
        }
    }
}
