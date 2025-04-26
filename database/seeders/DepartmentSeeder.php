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
            Department::factory(1)->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77de',
            ]);
            Department::factory(4)->create();
        });
    }
}
