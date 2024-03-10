<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Technology;
//Helpers
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Foreach_;

class TechnologySeeder extends Seeder
{
    
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $allTechnologies = [
            'HTML',
            'CSS',
            'Javascript',
            'Vue',
            'Laravel',
            'SASS',
            'C++',
            'C#',
            'React',
            'Typescript',
        ];

        foreach ($allTechnologies as $singleTechnology) {

            $technology = Technology::create([
                'title' => $singleTechnology,
                'slug' => str()->slug($singleTechnology),
            ]);
        }
    }
}
