<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;
//Helpers
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Foreach_;


class TypeSeeder extends Seeder
{

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $allType = [
            'E-commerce',
            'Blog',
            'Social Media Sites',
            'Entertainment Websites',
            'Online Learning',
            'Travel Websites',
            'Government Websites',
            'Portfolio Websites',
            'Forum or Community Online',
            'Search Websites',
            'Institutional Websites',
        ];

        foreach ($allType as $singleType) {

            $type = Type::create([
                'name' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}


