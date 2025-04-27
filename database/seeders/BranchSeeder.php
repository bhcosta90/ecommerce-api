<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class BranchSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            Branch::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d0',
            ]);

            Branch::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d1',
            ]);

            Branch::factory()->create([
                'id' => '019673a6-c4d7-70a1-8031-c91075ae77d2',
            ]);

            Branch::factory(rand(1, 2))->create();
        });
    }
}
