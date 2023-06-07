<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['JavaScript', 'Vue', 'PHP','SCSS'];
        for ($i=0; $i < count($array); $i++) { 
           $type = new Type();
           $type->title = $array[$i];
           $type->slug = Str::slug($type->title);
           $type->save();
        }
    }
}
