<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

//Models
use App\Models\Project;
use App\Models\Type;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function(){
            Project::truncate();
        });

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $title = fake()->sentence();
            $project->title = $title;
            $project->description = fake()->paragraph();
            $slug = Str::slug($title);
            $project->slug = $slug;
            $project->client = fake()->name();
            $project->type_id = Type::inRandomOrder()->first()->id;
            $project->save();
        }
    }
}
