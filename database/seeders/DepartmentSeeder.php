<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            Department::factory(5)->create();
        });
    }
}
