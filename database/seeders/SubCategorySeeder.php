<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Sector;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function(){
            Category::query()->each(function($department){
                SubCategory::factory(5)->create([
                    'category_id' => $department->id,
                ]);
            });
        });
    }
}
