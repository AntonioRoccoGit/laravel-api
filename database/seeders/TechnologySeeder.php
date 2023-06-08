<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['CSS', 'SCSS', 'JS','PHP','MySQL', 'HTML5','Vue', 'Laravel'];
        for ($i=0; $i < count($array); $i++) { 
           $type = new Technology();
           $type->name = $array[$i];
           $type->slug = Str::slug($type->name);
           $type->save();
        }
    }
}
