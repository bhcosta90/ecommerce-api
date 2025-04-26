<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class SectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            ($departments = Department::query())->each(function ($department) {
                Sector::factory(rand(2, 4))->create([
                    'department_id' => $department->id,
                ]);
            });

            Sector::factory()->create([
                'id'            => '019673a6-c4d7-70a1-8031-c91075ae77d0',
                'department_id' => $departments->first()->id,
            ]);

            Sector::factory()->create([
                'id'            => '019673a6-c4d7-70a1-8031-c91075ae77d1',
                'department_id' => $departments->first()->id,
            ]);

            Sector::factory()->create([
                'id'            => '019673a6-c4d7-70a1-8031-c91075ae77d2',
                'department_id' => $departments->first()->id,
            ]);
        });
    }
}
