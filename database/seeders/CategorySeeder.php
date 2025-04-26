<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Sector::query()->each(function($department){
            Category::factory(5)->create([
                'sector_id' => $department->id,
            ]);
        });
    }
}
