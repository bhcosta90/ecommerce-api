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
            Department::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d0',
            ]);

            Department::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d1',
            ]);

            Department::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d2',
            ]);

            Department::factory(rand(1, 2))->create();
        });
    }
}
