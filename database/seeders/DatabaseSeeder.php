<?php

declare(strict_types = 1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            SectorSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
        ]);
    }
}
